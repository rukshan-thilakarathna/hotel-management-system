<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class menuController extends Controller
{
    public function index($booking_id)
    {
        return view('profile.menu')->with(['booking_id' => $booking_id]);
    }
}
