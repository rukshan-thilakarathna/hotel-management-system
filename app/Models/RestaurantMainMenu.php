<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class RestaurantMainMenu extends Model
{
    use HasFactory , AsSource ,Filterable ,Attachable ,Chartable;

    protected $table = 'restaurant_main_menus';

    protected $fillable = [
        'name',
        'url',
        'image',
        'price',
        'weight',
        'discount',
    ];
}
