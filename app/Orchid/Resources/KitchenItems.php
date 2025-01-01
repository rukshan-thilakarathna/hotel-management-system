<?php

namespace App\Orchid\Resources;

use App\Models\KitchenItems as ModelsKitchenItems;
use Orchid\Crud\Resource;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class KitchenItems extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = ModelsKitchenItems::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [

            Input::make('name')
                ->title('Name')
                ->type('text')
                ->max(255)
                ->required(),
            
            Select::make('unit')
                ->title('Unit')
                ->required()
                ->options([
                    'kg' => 'kg',
                    'g' => 'grams',
                    'l' => 'liter',
                    'ml' => 'milliliter',
                    'pcs' => 'pieces',
                ]),

            Input::make('now_stork')
                ->title('Now stock')
                ->type('number')
                ->required(),

            Input::make('min_stork')
                ->title('Min stock')
                ->type('number')
                ->required(),
                
        ];
    }

    public static function perPage(): int
    {
        return 30;
    }


    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id'),

            TD::make('name', 'Name'),

            TD::make('unit', 'Unit'),

            TD::make('now_stork', 'Now stock'),

            TD::make('min_stork', 'Min stock'),

            TD::make('created_at', 'Date of creation')
                ->defaultHidden()
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->defaultHidden()
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
        return [
            Sight::make('name', 'Name'),
            Sight::make('unit', 'Unit'),
            Sight::make('now_stork', 'Now stock'),
            Sight::make('min_stork', 'Min stock'),

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
