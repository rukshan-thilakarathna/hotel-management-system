<?php

namespace App\Services;

use App\Models\RoomAvailability;
use App\Models\RoomBill;
use App\Models\RoomBooking;
use App\Models\Rooms;
use App\Models\roomsAddedFacilities;
use App\Mail\BookingSuccessMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class  RoomBookingService
{

    public $checkAvailability;

    /**
     * The constructor injects the CheckAvailabilityService
     * 
     * @param CheckAvailabilityService $checkAvailability
     */
    public function __construct(CheckAvailabilityService $checkAvailability)
    {
        $this->checkAvailability = $checkAvailability;
    }

    /**
     * This function will book a room and generate a room bill.
     *
     * @param array $bookingData The booking data
     * 
     * @return array The booking result
     */
    public function RoomBooking($bookingData)
    {
            

        try {
            // Find the room based on the given room_id or throw an exception if not found
            $room = Rooms::findOrFail($bookingData['room_id']);
            $bookUser = User::findOrFail($bookingData['user_id']);

            

            $additionalCharges = [];

            // Handle additional adult charges
            if ($room->adults < $bookingData['adults']) {
                $additionalAdults = $bookingData['adults'] - $room->adults;

                $addedFacility = new roomsAddedFacilities();
                $additionalCharges['adults'] = [
                    'charge' => $addedFacility->calculateAddedFacilityPrice(2, $additionalAdults),
                    'count' => $additionalAdults,
                ];
            }

            // Handle additional children charges
            if ($room->children < $bookingData['children']) {
                $additionalChildren = $bookingData['children'] - $room->children;

                $addedFacility = new roomsAddedFacilities();
                $additionalCharges['children'] = [
                    'charge' => $addedFacility->calculateAddedFacilityPrice(3, $additionalChildren),
                    'count' => $additionalChildren,
                ];
            }

            // Calculate total additional charges
            $totalAdditionalCharges = collect($additionalCharges)->sum('charge');
            $additionalChargesJson = json_encode($additionalCharges);

            // Check if the room is available for booking
            $avelabilityRooms = $this->checkAvailability->checkAvailability($bookingData['checkin'], $bookingData['checkout']);
            $avelabilityRoomsIdList = [];

            foreach ($avelabilityRooms['data'] as $roomId) {
                $avelabilityRoomsIdList[] = $roomId->room_id;
            }


            if (!in_array($bookingData['room_id'], $avelabilityRoomsIdList)) {
                return [
                    'status' => 'error',
                    'message' => 'Room is not available for booking.',
                ];
            }else{
                $this->BlockRooms($bookingData['room_id'], $bookingData['checkin'], $bookingData['checkout']);

                 // Create the room bill
                $roomBill = new RoomBill();
                $roomBill->room_id = $bookingData['room_id'];
                $roomBill->user_id = $bookUser->id;
                $roomBill->user_name = $bookUser->name;
                $roomBill->user_mobile_number = $bookUser->mobile_number ?? ''; // Ensure the key matches database schema
                $roomBill->added_charges = $additionalChargesJson;
                $roomBill->defult_charges = $room->price;
                $roomBill->other_charges = $totalAdditionalCharges;
                $roomBill->total_charges = $room->price + $totalAdditionalCharges;
                $roomBill->discount = 0;
                $roomBill->status = 'pending';
                $roomBill->payment_status = $bookingData['payment_status'];
                $roomBill->save();

                // Save the room booking
                $roomBooking = new RoomBooking();
                $roomBooking->check_in_date = $bookingData['checkin'];
                $roomBooking->check_out_date = $bookingData['checkout'];
                $roomBooking->check_in_time = $bookingData['checkin_time'];
                $roomBooking->check_out_time = $bookingData['checkout_time'];
                $roomBooking->user_id = $bookUser->id;
                $roomBooking->room_id = $bookingData['room_id'];
                $roomBooking->booking_type = $bookingData['booking_type'];
                $roomBooking->adults = $bookingData['adults'];
                $roomBooking->children = $bookingData['children'];
                $roomBooking->status = $bookingData['status'];
                $roomBooking->bill_id = $roomBill->id;
                

                if ($roomBooking->save()) {

                    // Dispatch the email to the queue
                    $bookingDetails = [
                        'user_name' => $bookUser->name,
                        'room_id' => $bookingData['room_id'],
                        'checkin' => date("Y-m-d", $bookingData['checkin']),
                        'checkout' => date("Y-m-d", $bookingData['checkout']),
                        'adults' => $bookingData['adults'],
                        'children' => $bookingData['children'],
                        'Only_room_price' => $room->price,
                    ];

                    // Dispatch the email to the queue
                    Mail::to($bookUser->email)->queue(new BookingSuccessMail($bookingDetails));

                    return [
                        'status' => 'success',
                        'message' => 'Room booking successful',
                        'additional_charges' => $additionalCharges,
                        'booking_data' => $roomBooking,
                        'room_bill' => $roomBill
                    ];
                }

                return [
                    'status' => 'error',
                    'message' => 'Room booking failed',
                ];
                
            }
            

           
        } catch (\Exception $e) {
            // Log error and return a user-friendly response
        
            Log::error('Room booking failed: ' . $e->getMessage());

            return [
                'status' => 'error',
                'message' => 'An error occurred during the booking process. Please try again later.',
            ];
        }
    }

    /**
     * Blocks the given room during the given check-in and check-out dates by
     * appending the year-month-date in the format [YYYY-MM-DD] to the existing
     * availability values for the room.
     *
     * @param int $roomId The ID of the room to block.
     * @param string $checkIn The check-in date.
     * @param string $checkOut The check-out date.
     *
     * @return bool True if the room was successfully blocked, false otherwise.
     */
    public function BlockRooms($roomId,$checkIn, $checkOut){

        $dates = $this->checkAvailability->getDate($checkIn, $checkOut);
        $availabilityDb = RoomAvailability::where('room_id',$roomId)->first();

        foreach ($dates['DateList'] as $key => $date){
            if ($date < 10){
                $date = str_replace("0","",$date);
            }
            $availabilityDb->$date = $availabilityDb->$date.'['.$dates['YearMonthDateList'][$key].']';
        }

        if ($availabilityDb->save()){
            return true;
        }else{
            return false;
        }  
    }

    /**
     * Unblocks the given room for the specified check-in and check-out dates
     * by removing the year-month-date format [YYYY-MM-DD] from the existing
     * availability values for the room.
     *
     * @param int $roomId The ID of the room to unblock.
     * @param string $checkIn The check-in date.
     * @param string $checkOut The check-out date.
     *
     * @return bool True if the room was successfully unblocked, false otherwise.
     */

    public function UnBlockRooms($roomId,$checkIn, $checkOut){

        $dates = $this->checkAvailability->getDate($checkIn, $checkOut);
        $availabilityDb = RoomAvailability::where('room_id',$roomId)->first();

        foreach ($dates['DateList'] as $key => $date){
            if ($date < 10){
                $date = str_replace("0","",$date);
            }
            $availabilityDb->$date = str_replace('['.$dates['YearMonthDateList'][$key].']',"",$availabilityDb->$date);
        }

        if ($availabilityDb->save()){
            return true;
        }else{
            return false;
        }  
    }



}
