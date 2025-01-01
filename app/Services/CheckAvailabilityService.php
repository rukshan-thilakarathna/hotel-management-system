<?php

namespace App\Services;

use App\Models\RoomAvailability;
use PHPUnit\TextUI\Configuration\Merger;

class  CheckAvailabilityService
{
    public function checkAvailability($checkIn, $checkOut, $adults = 0, $children = 0)
    {
        $currentDate = strtotime(date("Y-m-d"));

        if ($currentDate <= $checkIn && $currentDate <= $checkOut && $checkIn <= $checkOut) {

            $dates = $this->getDate($checkIn,$checkOut);
            $rooms = RoomAvailability::select('room_id')->with('room');


            if ($adults != 0){
                $rooms = $rooms->where('adults','>=',$adults );
            }


            if ($children != 0){
                $rooms = $rooms->where('children','>=',$children );
            }

            foreach ($dates['DateList'] as $key => $date){
                if ($date < 10){
                    $date = str_replace("0","",$date);
                }
                $rooms = $rooms->whereNot($date,'LIKE','%['.$dates['YearMonthDateList'][$key].']%' );
            }


            $rooms = $rooms->get();
            $dates =[
                    'checkIn' => $checkIn,
                    'checkOut' => $checkOut,
            ];


            return [
                'status' => true,
                'data' => $rooms,
                
            ];

        } else {
            return [
                'status' => false,
                'message' => 'Invalid date range provided.'
            ];
        }
    }

    public function getDate($checkIn, $checkOut)
    {
        $fullDateList = [];
        $dateList = [];
        $yearMonthDateList = [];

        for ($currentTimestamp = $checkIn; $currentTimestamp <= $checkOut; $currentTimestamp = strtotime("+1 day", $currentTimestamp)) {
            $fullDateList[] = date("Y-m-d", $currentTimestamp);
            $dateList[] = date("d", $currentTimestamp);
            $yearMonthDateList[] = date("Y-m", $currentTimestamp);
        }

        return [
            'FullDateList'=> $fullDateList,
            'DateList'=> $dateList,
            'YearMonthDateList'=> $yearMonthDateList,
        ];
    }
}
