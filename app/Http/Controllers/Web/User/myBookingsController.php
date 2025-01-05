<?php

namespace App\Http\Controllers\Web\User;
use App\Http\Controllers\Controller;
use App\Models\RoomBooking;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyBookingsController extends Controller
{
    public $rooms;
    public $bookings;

    public function index()
    {
        $today = strtotime(date('Y-m-d'));
        $bookings  = RoomBooking::where('user_id', Auth::user()->id)
            // ->where('check_in_date', '>=', $today)
            ->orderBy('check_in_date', 'asc')  // Sorting the bookings by check_in_date in ascending order
            ->where('status', '!=', 'Cancelled')
            ->with('room')
            ->get();
        
        $roomsArray = [];
        $bookingsArray = [];

        if (count($bookings) > 0) {
            foreach ($bookings as $key => $roomdata) {
                $roomsArray[$key] = $roomdata->room;
                $bookingsArray[$key] = $roomdata;
            }
        }

        $this->rooms = $roomsArray;

        return view('profile.my-bookings', [
            'rooms' => $this->rooms,
            'bookings' => $bookingsArray
        ]);
    }


}
