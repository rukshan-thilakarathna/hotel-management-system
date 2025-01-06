<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\RoomBooking;
use Illuminate\Http\Request;

class billController extends Controller
{
    public function index($booking_id)
    {

        $booking = RoomBooking::where('id', $booking_id)->with('room','user','bill')->first();

        // dd($booking);


        // dd($booking_id);
        return view('profile.bill')->with(['booking' => $booking]);
    }
}
