<?php

namespace App\Orchid\Resources;

use App\Models\RestaurantMainMenu as ModelsRestaurantMainMenu;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class RestaurantMainMenu extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = ModelsRestaurantMainMenu::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Select::make('is_desserts')
                ->title('Dessert')
                ->options([
                    0 => 'No',
                    1 => 'Yes',
                ]),

            Input::make('name')
                ->title('Name')
                ->type('text')
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

            TD::make('name'),

            TD::make('is_desserts', 'Dessert')
                ->render(function ($model) {
                    
                    return $model->is_desserts ? 'Yes' : 'No';
                }),

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
        return [
            Sight::make('name', 'Name'),
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
