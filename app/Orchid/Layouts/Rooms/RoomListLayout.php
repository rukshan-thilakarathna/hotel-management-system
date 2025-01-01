<?php

namespace App\Orchid\Layouts\Rooms;

use App\Models\Rooms;
use GuzzleHttp\Psr7\DroppingStream;
use League\CommonMark\Extension\CommonMark\Node\Block\ListData;
use Orchid\Crud\Action;
use Orchid\Screen\Action as ScreenAction;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Watson\Active\Facades\Active;

class RoomListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'rooms';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')
                ->sort()
                ->cantHide()
                ->filter(Input::make()),

            TD::make('number', 'Room number')
                ->sort()
                ->cantHide()
                ->filter(Input::make()),

            TD::make('size', 'Room size  (ft2)')
                ->sort()
                ->cantHide()
                ->filter(Input::make()),

            TD::make('price', 'Room price - '.env('CURRENCY'))
                ->sort()
                ->cantHide()
                ->filter(Input::make()),

            TD::make('status', 'Room Status')
            ->sort()
            ->render(function (Rooms $rooms) {
                switch ($rooms->status) {
                    case 0:
                        return '<span style="color:red">Blocked</span>';
                    case 1:
                        return '<span style="color:green">Available</span>';
                    case 2:
                        return '<span style="color:blue"  >Maintenance</span>';
                    case 3:
                        return '<span style="color:orange">Cleaning</span>';
                    default:
                        return '<span style="color:gray">Unknown</span>';
                }
            })
            ->cantHide(),

            TD::make(__('Actions'))
                ->width('100px')
                ->align(TD::ALIGN_CENTER)
                ->render(fn (Rooms $rooms) =>

                    DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([
                        ModalToggle::make('Update')
                            ->modal('Update')
                            ->icon('pencil')
                            ->modalTitle('Update room details ('.$rooms->number.')')
                            ->method('updateRoom', [
                                'id' => $rooms->id,
                            ]) ->asyncParameters([
                                'id'=>$rooms->id
                            ]),

                        Button::make('Delete')
                            ->icon('trash')
                            ->confirm(__('Are you sure you want to delete room?'))
                            ->method('remove', [
                                'id' => $rooms->id,
                            ]),

                        Link::make('View')
                            ->icon('eye')
                            ->route('platform.rooms.view', $rooms->id),

                    ])





                ),
        ];
    }
}
