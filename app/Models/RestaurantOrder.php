<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class RestaurantOrder extends Model
{
    use HasFactory , AsSource ,Filterable ,Attachable ,Chartable;

    // Specify the table name if it's different from the class name
    protected $table = 'restaurant_orders';

    // Define fillable fields for mass assignment
    protected $fillable = [
        'order_id',
        'user_id',
        'user_name',
        'room_id',
        'items',
        'type_of_order',
        'service_charge',
        'vat_charge',
        'total_amount',
        'order_status',
        'payment_status',
        'reson_for_order',
        'added_user',
    ];

    // Define relationships if needed
    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'added_user');
    }

    


}
