<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Screen\AsSource;

class Rooms extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    protected $fillable = [
        'number',
        'size',
        'price',
        'discount',
    ];

    protected $allowedFilters = [
        'number' => Like::class,
        'size' => Like::class,
        'price' => Where::class,
        'discount' => Where::class,
        'created_at' => WhereDateStartEnd::class,
        'updated_at' => WhereDateStartEnd::class,
    ];

    protected $allowedSorts = [
        'number',
        'size',
        'price',
        'discount',
        'created_at',
        'updated_at'
    ];
}
