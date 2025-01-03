<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{

    /*************  ✨ Codeium Command ⭐  *************/
        /**
         * Displays the user dashboard.
         *
         * @return \Illuminate\Http\Response
         */
    /******  fd48d944-9635-4663-ac78-3de842ef93ea  *******/ 
    public function index(){
        return view('dashboard');
    }

}
