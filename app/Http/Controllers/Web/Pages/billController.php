<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class billController extends Controller
{
    public function index($booking_id)
    {

        dd($booking_id);
        return view('profile.bill');
    }
}
