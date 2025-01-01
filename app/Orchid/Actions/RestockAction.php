<?php

namespace App\Orchid\Actions;

use Illuminate\Support\Collection;
use Orchid\Crud\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;

class RestockAction extends Action
{
    public function button(): Button
    {
        return Button::make('Restock Items')->icon('bs.box-arrow-up');
    }

    public function handle(Collection $models)
    {
        $models->each(function ($model) {
            $model->increment('now_stock', 10); // Increment stock by 10
        });

        Toast::success('Items restocked successfully!');
    }
}
