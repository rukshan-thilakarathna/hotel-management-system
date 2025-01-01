<?php

namespace App\Orchid\Layouts\Stock;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class StockListScreen extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'stocks';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('item.name', 'Item Name')
                ->sort()
                ->filter(TD::FILTER_SELECT, \App\Models\KitchenItems::all()->pluck('name', 'id')->toArray()),
        
            TD::make('unit', 'Unit')
                ->sort()
                ->filter(TD::FILTER_TEXT),

            TD::make('stock', 'Quantity')
                ->sort()
                ->filter(TD::FILTER_TEXT),

            TD::make('status', 'Status')
                ->sort()
                ->render(function ($model) {
                    $color = $model->status === 'in' ? 'bg-success text-white' : 'bg-danger text-white';
                    return "<span class='p-1 rounded {$color}'>{$model->status}</span>";
                }),

            TD::make('updated_at', 'Updated')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                })
                ->sort()
                ->filter(TD::FILTER_TEXT),

            TD::make('created_at', 'Created')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                })
                ->sort()
                ->filter(TD::FILTER_TEXT),
        ];
    }
}
