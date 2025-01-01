<?php

namespace App\Orchid\Resources\Rooms;

use App\Models\roomsAddedFacilities;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class roomsAddedFacilitiesResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = roomsAddedFacilities::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Group::make([
                Input::make('name')
                ->title('Name')
                ->placeholder('Enter Name')
                ->required()
                ->max(255)
                ->type('text'),

            Input::make('price')
                ->title('Price - '.env('CURRENCY'))
                ->placeholder('Enter Price - '.env('CURRENCY'))
                ->required()
                ->type('number'),
            ]),
            Group::make([
                Input::make('discount')
                ->title('Discount - %')
                ->value(0)
                ->placeholder('Enter Discount')
                ->type('number'),

                Input::make('count')
                    ->title('Count')
                    ->placeholder('Enter Count')
                    ->value(1)
                    ->type('number'),
            ]),

            Group::make([
                Select::make('status')
                ->title('Status')
                ->options([
                    '1' => 'Available',
                    '0' => 'Not Available',
                ])
                ->required(),
            ])
            

            

           



        ];
    }

    public static function perPage(): int
    {
        return 30;
    }
    
    public static function permission(): ?string
    {
        return 'platform.systems.roomsaddedfacilities';
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            // TD::make('id'),

            TD::make('name', 'Name'),

            TD::make('price', 'Price - '.env('CURRENCY')),

            TD::make('discount', 'Discount - %'),

            TD::make('count', 'Count'),



            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        $currency = config('app.currency', 'USD'); // Fallback to 'USD' if not set
    
        return [
            Sight::make('id', 'ID'),
            Sight::make('name', 'Name'),
            Sight::make('price', "Price - {$currency}"),
            Sight::make('discount', 'Discount (%)'),
            Sight::make('count', 'Stock Count'), 
            Sight::make('created_at', 'Date of Creation'),
            Sight::make('updated_at', 'Last Updated'),
            Sight::make('status', 'Status')->render(function ($model) {
                return $model->status ? 'Available' : 'Not Available';
            }),
        ];
    }
    

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}
