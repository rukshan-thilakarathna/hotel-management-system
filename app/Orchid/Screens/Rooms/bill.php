<?php

namespace App\Orchid\Screens\Rooms;

use App\Models\RestaurantOrder;
use App\Models\RoomBooking;
use App\Models\Rooms;
use App\View\Components\Room\bill as RoomBill;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class bill extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(RoomBooking $id): iterable
    {
        $booking = RoomBooking::where('id', $id->id)->with('room','user','bill')->first();
        $resturant = RestaurantOrder::where('booking_id', $id->id)->get();
        return [
            'booking' => $booking,
            'resturantbills' => $resturant

        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'bill';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::component(RoomBill::class),
        ];
    }
}
