<?php

namespace App\Orchid\Screens\Rooms;

use App\Models\RoomAvailability;
use App\Models\Rooms;
use App\Orchid\Layouts\Rooms\RoomListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class RoomListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Rooms $rooms): iterable
    {
        $rooms = Rooms::filters()->defaultSort('id', 'desc')->paginate(10);
        return [
            'rooms' => $rooms
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Room Management';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Create room')
                ->modalTitle('Create New room')
                ->modal('CreateModal')
                ->method('CreateModal')
                ->icon('bs.plus-circle'),
        ];
    }

    public function permission(): ?iterable
    {
        return [
            'platform.systems.rooms'
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
            RoomListLayout::class,


            Layout::modal('Update', [
                Layout::rows([

                    Input::make('room.number')
                        ->type('number')
                        ->title('Room number')
                        ->required(),


                    Input::make('room.size')
                        ->type('text')
                        ->title('Room size (ft2)')
                        ->required(),

                    Input::make('room.price')
                        ->type('number')
                        ->title('Room Price - '.env('CURRENCY'))
                        ->required(),

                    Input::make('room.adults')
                        ->type('number')
                        ->required()
                        ->title('adults')
                        ->required(),

                    Input::make('room.children')
                        ->type('number')
                        ->required()
                        ->title('children')
                        ->required(),

                    TextArea::make('room.description')
                        ->title('Description'),

                    Group::make([
                        Input::make('room.image')
                            ->type('checkbox')
                            ->vartical()
                            ->title('parking'),
                    ]),
                    
                    Select::make('room.status')
                        ->options([
                            '0'   => 'Close',
                            '1' => 'Open',
                            '2' => 'Maintenance', 
                            '3' => 'clening',
                        ])
                        ->title('Select tags')
                ]),
            ])->async('asyncGetData'),

            Layout::modal('CreateModal', [
                Layout::rows([

                    Input::make('room.number')
                        ->type('number')
                        ->title('Room number')
                        ->required(),


                    Input::make('room.size')
                        ->type('number')
                        ->title('Room size (ft2)')
                        ->required(),

                    Input::make('room.price')
                        ->type('number')
                        ->title('Room Price - '.env('CURRENCY'))
                        ->required(),

                    Input::make('room.adults')
                        ->type('number')
                        ->required()
                        ->title('adults')
                        ->required(),

                    Input::make('room.children')
                        ->type('number')
                        ->required()
                        ->title('children')
                        ->required(),

                    Input::make('room.image')
                        ->type('file')
                        ->required()
                        ->multiple()
                        ->title('Images (700px * 700px)'),

                    TextArea::make('room.description')
                        ->title('Description'),

                    Select::make('room.status')
                        ->options([
                            '0'   => 'Close',
                            '1' => 'Open',
                            '2' => 'Maintenance', 
                            '3' => 'clening',
                        ])
                        ->title('Select tags')
                ]),
            ])->async('asyncGetData')
        ];
    }

    public function asyncGetData(Rooms $id)
    {
        return [
            'room' => $id,
        ];
    }

    public function updateRoom(Request $request): void
    {
        $request->validate([
            'id' => 'required|exists:rooms,id',
            'room.number' => 'required|numeric',
            'room.size' => 'required|numeric',
            'room.price' => 'required|numeric',
            'room.image' => 'nullable|array',
            'room.status' => 'required|integer',
        ]);
    
        $room = Rooms::findOrFail($request->id);
    
        // Update room details
        $room->number = $request->input('room.number');
        $room->size = $request->input('room.size');
        $room->adults = $request->input('room.adults');
        $room->children = $request->input('room.children');
        $room->price = $request->input('room.price');
        $room->description = $request->input('room.description');
        $room->status = $request->input('room.status');
    
        $room->save();

        $roomAvailability = RoomAvailability::where('room_id', $room->id)->first();
        $roomAvailability->adults = $room->adults;
        $roomAvailability->children = $room->children;
        $roomAvailability->save();

    
        Toast::info(__('Room was updated'));
    }

    public function CreateModal(Request $request): void
    {
        $request->validate([
           'room.number' => 'required|numeric|unique:rooms,number',
            'room.size' => 'required|numeric',
            'room.price' => 'required|numeric',
            'room.image' => 'nullable|array',
            'room.image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'room.status' => 'required|integer',
        ]);
    
        $room = new Rooms();
        if ($request->hasFile('room.image')) {
            $images = [];
            foreach ($request->file('room.image') as $image) {
                $filename = str_replace(' ', '_', $image->getClientOriginalName()); // Replace spaces with underscores
                $images[] = $filename;
        
                // Optionally, store the file in the directory if needed
                $image->storeAs('rooms', $filename, 'public');
            }
            $room->image = json_encode($images); // Save the image names as JSON
        }
    
        $room->number = $request->input('room.number');
        $room->size = $request->input('room.size');
        $room->price = $request->input('room.price');
        $room->adults = $request->input('room.adults');
        $room->children = $request->input('room.children');
        $room->description = $request->input('room.description');
        $room->status = $request->input('room.status');
        $room->image = json_encode($images); // Save the image names as JSON
    
        $room->save();

        $roomAvailability = new RoomAvailability();
        $roomAvailability->room_id = $room->id;
        $roomAvailability->adults = $room->adults;
        $roomAvailability->children = $room->children;
        $roomAvailability->save();
    
        Toast::info(__('Room was created'));
    }

    public function remove(Request $request): void
    {
        $request->validate([
            'id' => 'required|exists:rooms,id',
        ]);
    
        $room = Rooms::findOrFail($request->id);
        $room->delete();
    
        Toast::info(__('Room was deleted'));
    }

   
    
}
