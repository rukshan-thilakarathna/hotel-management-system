<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class menuController extends Controller
{
    public function index()
    {
        return view('profile.menu');
    }
}
