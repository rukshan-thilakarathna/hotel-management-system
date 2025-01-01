<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;


class RestaurantMenu extends Model
{

    use HasFactory , AsSource ,Filterable ,Attachable ,Chartable;

    protected $table = 'restaurant_menus';

    protected $fillable = [
        'name',
        'url',
        'posion',
        'main_menu_id',
        'image',
        'price',
        'weight',
        'discount',
    ];

    public function mainMenu()
    {
        return $this->belongsTo(RestaurantMainMenu::class);
    }
}
