<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\RestaurantOrder;
use App\Models\RoomBooking;
use Illuminate\Http\Request;

class billController extends Controller
{
    public function index($booking_id)
    {

        $booking = RoomBooking::where('id', $booking_id)->with('room','user','bill')->first();
        $resturant = RestaurantOrder::where('booking_id', $booking_id)->get();

        return view('components.room.bill')->with(['booking' => $booking, 'resturantbills' => $resturant]);
    }
}
