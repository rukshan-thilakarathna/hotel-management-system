<?php

namespace App\Orchid\Layouts\RoomBooking;

use App\Models\RoomAvailability;
use App\Models\RoomBooking;
use App\Models\Rooms;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\TD;

class RoomBookingListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'bookings';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {

        return [

            TD::make('room_id', 'Room Id')
                ->sort()
                ->cantHide(),

            TD::make('user_id', 'User Id')
                ->sort(),

            TD::make('user.name', 'User Name')
                ->sort()
                ->cantHide(),

            TD::make('adults', 'Adults')
                ->sort()
                ->cantHide(),

            TD::make('children', 'Children')
                ->sort()
                ->cantHide(),

            TD::make('check_in_date', 'Check In Date')
                ->sort()
                ->render(function (RoomBooking $booking) {
                    return  date("Y-m-d", $booking->check_in_date);
                })
                ->cantHide(),

            TD::make('check_in_time', 'check In Time')
                ->sort(),

            TD::make('check_out_date', 'Check Out Date')
                ->sort()
                ->render(function (RoomBooking $booking) {
                    return  date("Y-m-d", $booking->check_out_date);
                })
                ->cantHide(),

            TD::make('check_out_time', 'Check Out Time')
                ->sort(),
          
            TD::make('status', 'Booking Status')
                ->sort(),

            TD::make('room.created_at', 'Action')
                ->render(function (RoomBooking $RoomBooking) {

                  
                return Link::make('Bill')
                    ->route('platform.rooms.bill', $RoomBooking->room_id)->style('background: #43d76b;border-radius: 5px;padding: 8px;')->icon('eye');
                })
                
                ->sort()
                ->cantHide(),
                
        ];
    }
}
