<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class KitchenItemsManage extends Model
{
    use HasFactory , AsSource ,Filterable ,Attachable ,Chartable;

    // Define the table name (optional if it matches the plural of the model name)
    protected $table = 'kitchen_items_manages';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'item_id',
        'unit',
        'stock',
        'status',
    ];

    protected $allowedFilters = [
            'item_id'    => Like::class,
            'unit'       => Like::class,
            'stock'      => Like::class,
            'status'     => Like::class,
            'updated_at' => Like::class,
            'created_at' => Like::class,
    ];

    /**
     * The attributes for which can use sort in url.
    *
    * @var array
    */
    protected $allowedSorts = [
        'item_id',
        'unit',
        'stock',
        'status',
        'updated_at',
        'created_at',
    ];

    public function item()
    {
        return $this->belongsTo(KitchenItems::class, 'item_id');
    }
}
