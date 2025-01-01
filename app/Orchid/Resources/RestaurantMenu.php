<?php

namespace App\Orchid\Resources;

use App\Models\RestaurantMainMenu;
use App\Models\RestaurantMenu as ModelsRestaurantMenu;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Sight;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\TD;
class RestaurantMenu extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = ModelsRestaurantMenu::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Select::make('main_menu_id')
                ->fromModel(RestaurantMainMenu::class, 'name', 'id')
                ->title('Main Menu')
                ->required(),

            Input::make('name')
                ->title('Name')
                ->type('text')
                ->max(255)
                ->required(),

            Input::make('image')
                ->title('Image')
                ->type('file'),

            Input::make('price')
                ->title('Price - '.env('CURRENCY'))
                ->type('text')
                ->required(),

            Input::make('weight')
                ->title('Weight (grams)')
                ->type('text')
                ->required(),
            
            Input::make('posion')
                ->title('Posion')
                ->value('1 Posion')
                ->type('text')
                ->required(),

            Input::make('id')
                ->type('hidden'),

            Input::make('discount')
                ->title('Discount')
                ->type('text')
                ->required(),

        ];
    }

    public static function perPage(): int
    {
        return 30;
    }

    public function onSave(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|min:3',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'discount' => 'required|numeric|between:0,100',
        ]);

        if($request->has('file')) {
        // Handle image upload
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }   
        // Save or update the RestaurantMenu record
        if ($request->has('id') && $request->id != null) {
            // Update existing record
            $menu = ModelsRestaurantMenu::findOrFail($request->id);
            $menu->image = $imageName ?? $menu->image; // Replace image if a new one is provided
        } else {
            // Create new record
            $menu = new ModelsRestaurantMenu();
            $menu->image = $imageName ?? null;
        }

        $menu->name = $request->name;
        $menu->url = Str::slug($request->name);
        $menu->price = $request->price;
        $menu->posion = $request->posion;
        $menu->main_menu_id = $request->main_menu_id;
        $menu->weight = $request->weight;
        $menu->discount = $request->discount;

        // Save to the database
        $menu->save();

        return response()->json(['message' => 'Restaurant menu item saved successfully!']);
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

            TD::make('main_menu_id', 'Main Menu')
                ->render(function ($model) {
                    return $model->mainMenu->name;
                }),

            TD::make('image', 'Image')
                ->render(function ($model) {
                
                    return  $model->image ? '<img src="' . asset('images/' . $model->image) . '" width="100" height="100" alt="Image">' : null;
            }),

            TD::make('price', 'Price - '.env('CURRENCY')),

            TD::make('weight', 'Weight (grams)'),

            TD::make('posion', 'Posion'),

            TD::make('discount', 'Discount - %'),



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
            Sight::make('price', 'Price - '.env('CURRENCY')),
            Sight::make('weight', 'Weight (grams)'),
            Sight::make('posion', 'Posion'),
            Sight::make('discount', 'Discount - %'),
            Sight::make('image', 'Image')
                ->render(function ($model) {
                    return $model->image ? asset('images/' . $model->image) : null;
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
