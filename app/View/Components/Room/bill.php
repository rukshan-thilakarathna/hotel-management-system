<?php

namespace App\View\Components\Room;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class bill extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public  $booking,
        public  $resturantbills
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.room.bill');
    }
}
