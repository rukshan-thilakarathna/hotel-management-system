<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\RoomBooking;
use Illuminate\Http\Request;

class menuController extends Controller
{
    public function index($booking_id)
    {
        $booking = RoomBooking::where('id',$booking_id)->with('room','user')->first();
        
        return view('profile.menu')->with(['booking' => $booking]);
    }
}
