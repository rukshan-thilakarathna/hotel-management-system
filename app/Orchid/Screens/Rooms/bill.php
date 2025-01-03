<?php

namespace App\Orchid\Screens\Rooms;

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
    public function query(Rooms $id): iterable
    {
        return [];
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
