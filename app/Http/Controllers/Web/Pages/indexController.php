<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    
    /*************  ✨ Codeium Command ⭐  *************/
        /**
         * Returns the main page of the website.
         *
         * @return \Illuminate\Http\Response
         */
    /******  2f01583c-2bbc-4787-87db-e4598182ae90  *******/ 
    public function index(){
        return view('index');
    }
}
