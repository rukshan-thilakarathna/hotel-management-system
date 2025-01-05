<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\RoomBooking;
use App\Services\RoomBookingService;
use Illuminate\Http\Request;

class cancallBookingController extends Controller
{
    public $roomBooking;

    public function __construct(RoomBookingService $roomBooking)
    {
        $this->roomBooking = $roomBooking;
    }

    public function index(Request $request)
    {
        $booking = RoomBooking::find($request->id);

     

      

        $result =$this->roomBooking->UnBlockRooms($booking->room_id, $booking->check_in_date, $booking->check_out_date , $booking->id);

    
        if ($result) {
            return redirect()->route('my-bookings')->with('success', 'Booking cancelled successfully.');
        }else {
            return redirect()->route('my-bookings')->with('error', 'Failed to cancel booking.');
        }
    }
}
