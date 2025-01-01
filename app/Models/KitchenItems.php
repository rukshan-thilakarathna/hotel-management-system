<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class KitchenItems extends Model
{

    use HasFactory , AsSource ,Filterable ,Attachable ,Chartable;

    // Define the table name (optional if it matches the plural of the model name)
    protected $table = 'kitchen_items';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'name',
        'unit',
        'now_stork',
        'min_stork',
    ];
}
