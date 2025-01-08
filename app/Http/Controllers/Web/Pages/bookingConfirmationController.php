<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\Rooms;
use App\Services\RoomBookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class bookingConfirmationController extends Controller
{

    public $roomBooking;

    public function __construct(RoomBookingService $roomBooking)
    {
        $this->roomBooking = $roomBooking;
    }

   public function index($id)
   {
    $room = Rooms::find($id);
     return view('booking-confirmation', compact('room'));
   }

   public function store(Request $request)
   {

    $request->validate([
        'adults' => 'required|integer|min:1|max:3',
        'children' => 'required|integer|max:3',
        'room_id' => 'required',
    ], [
        'adults.min' => 'The number of adults must be at least 1.',
        'adults.max' => 'The number of adults cannot exceed 3.',
        'children.max' => 'The number of children cannot exceed 3.',
    ]);

    $room = Rooms::where('id', $request->room_id)->first();

        $bookingData = [
            'checkin' => strtotime(session('checkin_date')),
            'checkout' => strtotime(session('checkout_date')),
            'checkin_time' => '1.00 PM',           
            'checkout_time' => '12.00 PM',
            'user_id' => Auth::user()->id,
            'room_id' => $request->room_id,
            'room_number' => $room->number,
            'booking_type' => 'Online',
            'adults' => $request->adults,
            'status' => 'Pending',
            'payment_status' =>'Pending',
            'children' => $request->children,
            'note' => $request->note
        ];

        $result = $this->roomBooking->RoomBooking($bookingData);

        if ($result['status'] === 'success') {
            return redirect()->route('my-bookings')->with('success', $result['message']);
        }else{
            return redirect()->route('rooms')->with('error', $result['message']);
        }

  }


}
