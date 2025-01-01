<?php

namespace App\Orchid\Layouts\RoomBooking;

use App\Models\RoomAvailability;
use App\Models\Rooms;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\TD;

class RoomAvailabilityListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'room';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {

        return [
            TD::make('room.number', 'Room number')
                ->sort()
                ->cantHide(),

            TD::make('room.size', 'Room size  (ft2)')
                ->sort()
                ->cantHide(),

            TD::make('room.adults', 'Adults')
                ->sort()
                ->cantHide(),

            TD::make('room.children', 'Children')
                ->sort()
                ->cantHide(),

            TD::make('room.price', 'Room price')
                ->sort()
                ->cantHide(),

            TD::make('room.discount', 'Discount')
                ->sort()
                ->cantHide(),

            TD::make('room.status', 'Room Status')
                ->sort()
                ->render(function (RoomAvailability $roomAvailability) {
                    $room = Rooms::find($roomAvailability->room_id);
                    return $room->status ? 'Available' : 'Not Available';
                }),
            
            TD::make('room.created_at', 'Action')
                ->render(function (RoomAvailability $roomAvailability) {

                    // dd($roomAvailability);
                    $room = Rooms::find($roomAvailability->room_id);
                return ModalToggle::make('Place New Booking')
                    ->modalTitle('Place Booking')
                    ->style('background: #43d76b;border-radius: 5px;padding: 8px;')
                    ->icon('bs.plus-circle')
                    ->method('placeBookingForm',[
                        'room_id' => $room->id
                    ])
                    ->modal('placeBookingForm');
                })
                ->sort()
                ->cantHide(),
                
        ];
    }
}
