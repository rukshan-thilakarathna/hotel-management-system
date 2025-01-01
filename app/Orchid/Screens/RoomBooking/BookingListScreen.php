<?php

namespace App\Orchid\Screens\RoomBooking;

use App\Models\RoomBooking;
use App\Orchid\Layouts\RoomBooking\RoomBookingListLayout;
use App\Services\CheckAvailabilityService;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\DateRange;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class BookingListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public $checkAvailability;

    public function __construct(CheckAvailabilityService $checkAvailability)
    {
        $this->checkAvailability = $checkAvailability;
    }


    public function query(): iterable
    {
        $AllBookings =  RoomBooking::get();

     
        return [
            'bookings' => $AllBookings
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Booking Management';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

            ModalToggle::make('Place New Booking')
                ->modalTitle('Place New Booking')
                ->icon('bs.plus-circle')
                ->method('placeBooking')
                ->modal('PlaceBooking'),
        ];

    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::modal('PlaceBooking',Layout::rows([
                DateRange::make('date_range')
                    ->title('Check-in/Check-out')
                    ->required(),
            ]))->ApplyButton('Check Availability')->CloseButton('Close'),

            RoomBookingListLayout::class
        ];
    }

    public function placeBooking(Request $request)
    {
        // Validate input
        $request->validate([
            'date_range.start' => 'required|date',
            'date_range.end' => 'required|date',
        ]);

        $checkIn = strtotime($request->date_range['start']);
        $checkOut = strtotime($request->date_range['end']);


        // Check availability
        $availability = $this->checkAvailability->checkAvailability($checkIn, $checkOut);

        if ($availability['status']) {
            return redirect()->route('platform.systems.room-availability',[$checkIn,$checkOut]);
        }else{
            Alert::error($availability['message']);
        }
    }
}
