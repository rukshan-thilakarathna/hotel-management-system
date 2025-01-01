<?php

namespace App\Orchid\Screens\RoomBooking;

use App\Models\User;
use App\Orchid\Layouts\RoomBooking\RoomAvailabilityListLayout;
use App\Services\CheckAvailabilityService;
use App\Services\RoomBookingService;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\DateRange;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class RoomAvailabilityListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */

    

    public $checkAvailability;
    public $roomBooking;
    public $checkin;
    public $checkout;

    public function __construct(CheckAvailabilityService $checkAvailability , RoomBookingService $roomBooking)
    {
        $this->checkAvailability = $checkAvailability;
        $this->roomBooking = $roomBooking;
    }

    public function query(Request $request): iterable
    {
        // Check availability
        $availability = $this->checkAvailability->checkAvailability($request->checkin, $request->checkout);

        return [
            'room' => $availability['data'],
        ];

    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Room Availability List';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Back')->icon('arrow-left')->route('platform.systems.bookings'),
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
            RoomAvailabilityListLayout::class,
            
                Layout::modal('placeBookingForm',Layout::rows([

                    Select::make('user_id')
                        ->title('User')
                        ->options(User::all()->pluck('email', 'id'))
                        ->required(),

                    Input::make('adults')
                        ->type('number')
                        ->title('Adults Count')
                        ->value(1)
                        ->required(),

                    Input::make('children')
                        ->type('number')
                        ->title('Children Count')
                        ->value(0)
                        ->required(),

                    Select::make('payment')
                        ->title('Payment')
                        ->options([
                            'Cash' => 'Cash',
                            'Credit Card' => 'Credit Card',
                            'Debit Card' => 'Debit Card',
                            'PayPal' => 'PayPal',
                            '0' => 'Pending Payment',
                            ]),

                    TextArea::make('note')
                        ->title('Note')
                        ->rows(3),

                 
                ]))->ApplyButton('Confirm')->CloseButton('Close'),
       
        ];
    }



    public function placeBookingForm($checkin, $checkout,Request $request ,$room_id)
    {

        $bookingData = [
            'checkin' => $checkin,
            'checkout' => $checkout,
            'checkin_time' => '1.00 PM',           
            'checkout_time' => '12.00 PM',
            'user_id' => $request->user_id ?? auth()->user()->id,
            'room_id' => $room_id,
            'booking_type' => 'Offline',
            'adults' => $request->adults,
            'status' => $request->payment == '0' ? 'Pending' : 'Confirmed',
            'payment_status' => $request->payment == '0' ? 'Pending' : 'Confirmed',
            'children' => $request->children,
            'note' => $request->note
        ];
        
        $result = $this->roomBooking->RoomBooking($bookingData);

        if ($result['status'] === 'success') {
            Toast::info($result['message']);
            return redirect()->route('platform.systems.bookings');
        }else{
            Toast::error($result['message']);
            return redirect()->route('platform.systems.bookings');
        }
      

    }





}
