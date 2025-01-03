<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class diningController extends Controller
{
    public function index(){
        return view('dining');
    }
}
