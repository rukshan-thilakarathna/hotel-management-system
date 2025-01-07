<?php

namespace App\Orchid\Layouts\RoomBooking;

use App\Models\RoomAvailability;
use App\Models\RoomBooking;
use App\Models\Rooms;
use App\Models\User;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
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
                ->filter(Input::make())
                ->cantHide(),

            TD::make('user_id', 'User Id')
                ->sort()
                ->filter(
                    Select::make('user')
                        ->fromModel(User::class, 'id','id')
                ),

            TD::make('user.email', 'User Email')
                ->sort()
                ->filter(
                    Select::make('user')
                        ->fromModel(User::class, 'email','id')
                )
                ->cantHide(),

            TD::make('adults', 'Adults')
                ->sort()
                ->filter(Input::make())
                ->cantHide(),

            TD::make('children', 'Children')
                ->sort()
                ->filter(Input::make())
                ->cantHide(),

            TD::make('check_in_date', 'Check In Date')
                ->sort()
                ->filter(Input::make())
                ->render(function (RoomBooking $booking) {
                    return  date("Y-m-d", $booking->check_in_date);
                })
                ->cantHide(),

           

            TD::make('check_out_date', 'Check Out Date')
                ->sort()
                ->filter(Input::make())
                ->render(function (RoomBooking $booking) {
                    return  date("Y-m-d", $booking->check_out_date);
                })
                ->cantHide(),

          

            TD::make('status', 'Booking Status')
                ->sort()
                ->filter(Input::make()),

            TD::make('room.created_at', 'Action')
                ->render(function (RoomBooking $RoomBooking) {


                return Link::make('Bill')
                    ->route('platform.rooms.bill', $RoomBooking->id)->style('background: #43d76b;border-radius: 5px;padding: 8px;')->icon('eye');
                })

                ->cantHide(),

                TD::make('room.created_at', 'Action')
                ->render(function (RoomBooking $RoomBooking) {


                return Link::make('Bill')
                    ->route('platform.rooms.bill', $RoomBooking->id)->style('background: #43d76b;border-radius: 5px;padding: 8px;')->icon('eye');
                })

                ->cantHide(),

        ];
    }
}
