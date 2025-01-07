<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\Rooms;
use App\Services\CheckAvailabilityService;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class roomsController extends Controller
{

    public $rooms;
    public $checkAvailability;


    public function __construct(CheckAvailabilityService $checkAvailability)
    {
        $this->checkAvailability = $checkAvailability;
    }

    /**
     * This function is used to display the list of rooms,
     * filter rooms according to the check-in and check-out dates,
     * and redirect to the index page if no rooms are available.
     *
     * @param Request $request The request object
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $this->rooms = Rooms::get();

        $availabilityStatus = false;

        if($request->input('dateRange') || ($request->input('checkIn') && $request->input('checkIn'))){

            $availabilityStatus = true;

            if($request->input('dateRange')){
                list($checkin_date, $checkout_date) = explode(' - ', $request->input('dateRange'));
            }else{
                $checkin_date = $request->input('checkIn');
                $checkout_date = $request->input('checkOut');
            }

            session()->put('checkin_date', $checkin_date);
            session()->put('checkout_date', $checkout_date);
            $checkIn = strtotime($checkin_date);
            $checkOut = strtotime($checkout_date);
            $adults = $request->input('adults') ?? 1;
            $children = $request->input('children') ?? 0;
            session()->put('adults', $adults);
            session()->put('children', $children);



            $filterData = null;

            if($request->input('filter')){
                $filterData = [];

                if($request->input('ac') == 1 || $request->input('ac') == 0){
                    $filterData['ac'] = $request->input('ac');
                }

                if($request->input('free_wifi')){
                    $filterData['free_wifi'] = $request->input('free_wifi');
                }

                if($request->input('parking')){
                    $filterData['parking'] = $request->input('parking');
                }

                if($request->input('restaurant')){
                    $filterData['restaurant'] = $request->input('restaurant');
                }

                if($request->input('pet_friendly')){
                    $filterData['pet_friendly'] = $request->input('pet_friendly');
                }

                if($request->input('room_service')){
                    $filterData['room_service'] = $request->input('room_service');
                }

                if($request->input('smoking')){
                    $filterData['smoking'] = $request->input('smoking');
                }

                if($request->input('wheelchair_accessible')){
                    $filterData['wheelchair_accessible'] = $request->input('wheelchair_accessible');
                }

                if($request->input('swimming_pool')){
                    $filterData['swimming_pool'] = $request->input('swimming_pool');
                }

                if($request->input('hours_security')){
                    $filterData['hours_security'] = $request->input('hours_security');
                }

                if($request->input('front_desk')){
                    $filterData['front_desk'] = $request->input('front_desk');
                }

                if($request->input('bed') == 1 || $request->input('bed') == 2 || $request->input('bed') == 3 || $request->input('bed') == 4){
                    $filterData['bed'] = $request->input('bed');
                }

                if($request->input('minprice') && $request->input('maxprice')){
                    $filterData['price'] = [$request->input('minprice'), $request->input('maxprice')];
                }
            }





            $availability = $this->checkAvailability->checkAvailability($checkIn, $checkOut ,$adults,$children,$filterData);


            if ($availability['status']) {

                $roomsArray = [];

                if(count($availability['data']) > 0){
                    foreach ($availability['data'] as $key => $roomdata) {
                            $roomsArray[$key] = $roomdata->room;
                    }

                    $this->rooms = $roomsArray;

                }else{
                    session()->put('checkin_date', date('Y-m-d'));
                    session()->put('checkout_date', date('Y-m-d', strtotime('+1 day')));

                    // if($request->input('from_page') && $request->input('from_page') == 'rooms'){
                    //     return redirect()->route($request->input('from_page'))
                    //     ->with('warning', 'No rooms available');
                    // }

                    return redirect()->back()
                    ->with('warning', 'No rooms available');
                }



            } else {
                session()->put('checkin_date', date('Y-m-d'));
                session()->put('checkout_date', date('Y-m-d', strtotime('+1 day')));

                // if($request->input('from_page') && $request->input('from_page') == 'rooms'){
                //     return redirect()->route($request->input('from_page'), [$checkin_date, $checkout_date])
                //     ->with('error', $availability['message']);
                // }
                return redirect()->back()
                ->with('error', $availability['message']);

            }
        }


        return view('rooms')->with([ 'availabilityStatus' => $availabilityStatus ,'rooms' => $this->rooms, 'checkin' => $checkin ?? 0, 'checkout' => $checkout ?? 0]);
    }




}
