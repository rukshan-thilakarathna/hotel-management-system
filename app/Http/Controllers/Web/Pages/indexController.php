<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\Rooms;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public $rooms;
    public function __construct()
    {
        $this->rooms = Rooms::get();
    }

    /*************  ✨ Codeium Command ⭐  *************/
        /**
         * Returns the main page of the website.
         *
         * @return \Illuminate\Http\Response
         */
    /******  2f01583c-2bbc-4787-87db-e4598182ae90  *******/ 
    public function index(){
        // dd($this->rooms);
        return view('index')->with(['rooms' => $this->rooms]);
    }
}
