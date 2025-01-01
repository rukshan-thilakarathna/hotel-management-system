<?php

namespace App\Orchid\Resources\Rooms;

use App\Models\roomPromotionPackage;
use Illuminate\Http\Request;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Toast;

class PromotionPackage extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = roomPromotionPackage::class;

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
                    ->type('text')
                    ->max(255)
                    ->required()
                    ->title('Name'),
            
                Input::make('price')
                    ->type('number')
                    ->required()
                    ->title('Price - '.env('CURRENCY')),   
            ]),

            Group::make([
                Input::make('discount')
                    ->type('number')
                    ->value(0)
                    ->required()
                    ->title('Discount'),

                TextArea::make('description')
                    ->title('Description'), 
            ]),

            Group::make([
                Input::make('image')
                    ->type('file')
                    ->required()
                    ->title('Image'),   

                Input::make('start_date')
                    ->type('date')
                    ->required()
                    ->title('Start date'),
            ]),

            Group::make([
                Input::make('end_date')
                    ->type('date')
                    ->required()
                    ->title('End date'),

                Input::make('seo_meta_title')
                    ->type('text')
                    ->max(255)
                    ->title('Seo meta title'),
            ]),

            Group::make([
                Input::make('seo_meta_description')
                    ->type('text')
                    ->max(255)
                    ->title('Seo meta description'),

                Input::make('seo_url')
                    ->type('text')
                    ->max(255)
                    ->title('Seo url'),
            ]),

            Input::make('id')
                ->type('hidden'),

            
            Select::make('status')
                ->options([
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                ])
                ->title('Status'),


        ];
    }

    public static function perPage(): int
    {
        return 30;
    }

    public function onSave(Request $request)
        {
            $request->validate([
                'name' => 'required|min:3',
                'price' => 'required|numeric',
            ]);

            if($request->has('id') && $request->id == null) {
              
                    $request->validate([
                        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
    
                    $image = $request->image;
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images'), $imageName);
               
                    $request->merge(['image' => $imageName]);
           
    
                $roomPromotionPackage = new roomPromotionPackage();
                $roomPromotionPackage->name = $request->name;
                $roomPromotionPackage->price = $request->price;
                $roomPromotionPackage->discount = $request->discount;
                $roomPromotionPackage->description = $request->description;
                $roomPromotionPackage->image = $imageName ?? null;
                $roomPromotionPackage->start_date = $request->start_date;
                $roomPromotionPackage->end_date = $request->end_date;
                $roomPromotionPackage->status = $request->status;
                $roomPromotionPackage->seo_meta_title = $request->seo_meta_title;
                $roomPromotionPackage->seo_meta_description = $request->seo_meta_description;
                $roomPromotionPackage->seo_url = $request->seo_url;
                $roomPromotionPackage->save();
    
                Toast::info(__('Room promotion package was saved.'));

            }else{

                if ($request->image) {
                    $request->validate([
                        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
    
                    $image = $request->image;

                    $imageName = time() . '.' . $image->getClientOriginalExtension();

                    $image->move(public_path('images'), $imageName);
                    
                    $request->merge(['image' => $imageName]);
                }

                $roomPromotionPackage = roomPromotionPackage::find($request->id);
                $roomPromotionPackage->name = $request->name;
                $roomPromotionPackage->price = $request->price;
                $roomPromotionPackage->discount = $request->discount;
                $roomPromotionPackage->description = $request->description;
                $roomPromotionPackage->image = $imageName ?? null;
                $roomPromotionPackage->start_date = $request->start_date;
                $roomPromotionPackage->end_date = $request->end_date;
                $roomPromotionPackage->status = $request->status;
                $roomPromotionPackage->seo_meta_title = $request->seo_meta_title;
                $roomPromotionPackage->seo_meta_description = $request->seo_meta_description;
                $roomPromotionPackage->seo_url = $request->seo_url;
                $roomPromotionPackage->save();
    
                Toast::info(__('Room promotion package was updated.'));
            }

           
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
            TD::make('price', 'Price'),
            TD::make('discount', 'Discount'),
            // TD::make('description', 'Description'),
            TD::make('image', 'Image')
                ->render(function ($model) {
                    return '<img src="' . asset('images/' . $model->image) . '" width="100" height="100" alt="Image">';
                }),
            TD::make('start_date', 'Start date'),
            TD::make('end_date', 'End date'),
            // TD::make('status', 'Status'),
            // TD::make('seo_meta_title', 'Seo meta title'),
            // TD::make('seo_meta_description', 'Seo meta description'),
            // TD::make('seo_url', 'Seo url'),

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
            Sight::make('id'),
            Sight::make('name', 'Name'),
            Sight::make('price', 'Price'),
            Sight::make('discount', 'Discount'),
            Sight::make('description', 'Description'),
            Sight::make('image', 'Image'),
            Sight::make('start_date', 'Start date'),            
            Sight::make('end_date', 'End date'),
            Sight::make('status', 'Status'),
            Sight::make('seo_meta_title', 'Seo meta title'),
            Sight::make('seo_meta_description', 'Seo meta description'),
            Sight::make('seo_url', 'Seo url'),
            Sight::make('created_at', 'Date of creation'),
            Sight::make('updated_at', 'Update date'),   
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
