<?php

namespace App\Orchid\Screens\Rooms;

use App\Models\Availability;
use App\Models\Rooms;
use App\View\Components\RoomsCalendar;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Button;
use App\Models\Booking;
use App\Models\RoomAvailability;
use App\Models\RoomBooking;
use App\Services\RoomBookingService;
use Orchid\Support\Facades\Toast;
use Carbon\Carbon;

class RoomsCalendarListScreen extends Screen
{
    public $RoomNumber = 0;
    public $Roomid = 0;
    public $BlockRooms;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */

     public function __construct(RoomBookingService $roomBooking)
     {
        $this->BlockRooms = $roomBooking;
     }
    public function query(Rooms $id): iterable
    {

        $availabierelities = RoomAvailability::where('room_id', $id->id)->get();


        $this->RoomNumber = $id->number;
        $this->Roomid = $id->id;

        return [
            'id' => $id->number,
            'availabierelities' => $availabierelities,
            ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Room number 00'.$this->RoomNumber.' Booking Calendar';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Add Filters')
                ->modal('Feilter')
                ->method('Filters',[
                    'id'=>$this->Roomid
                ]),

                Button::make(__('Block'))
                ->icon('bs.check-circle')
                ->method('Block',[
                    'id'=>$this->Roomid
                ]),

            // Link::make('Back')->route('room-types')
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
            \Orchid\Support\Facades\Layout::component(RoomsCalendar::class),

            Layout::modal('Feilter',Layout::rows([
                Group::make([
                    Input::make('event_month')
                        ->type('month')
                        ->title('Event Month')
                        ->value(now()->format('Y-m'))
                        ->placeholder('YYYY-MM')
                        ->horizontal(),
                ],),
            ]))->applyButton('Apply'),
        ];
    }

    public function Filters(Request $request)
    {
        return redirect('admin/calendar/'.$request->id.'?Date='.$request->event_month);
    }

    public function Block(Request $request)
    {
        if($request->dates[0])
        $chackIn = strtotime($request->dates[0]);
        $chackOut = strtotime( $request->dates[count($request->dates) - 1]);

        dd($request->id);
    }

    


}
