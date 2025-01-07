<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Screen\AsSource;

class RoomBooking extends Model
{
    use HasFactory ,AsSource ,Searchable ,Filterable ,Attachable;

    protected $fillable = [
        'id' ,
        'room_id' ,
        'user_id' ,
        'adults' ,
        'children' ,
        'booking_type' ,
        'check_in_time' ,
        'check_in_date' ,
        'check_out_time' ,
        'check_out_date' ,
        'status' ,
        'bill_id' ,
        'created_at' ,
        'updated_at' ,
    ];

    protected $allowedFilters = [
        'id'         => Like::class,
        'room_id'       => Like::class,
        'user_id'      => Like::class,
        'adults'      => Like::class,
        'children'      => Like::class,
        'booking_type'      => Like::class,
        'check_in_time'      => Like::class,
        'check_in_date'      => Like::class,
        'check_out_time'      => Like::class,
        'check_out_date'      => Like::class,
        'status'      => Like::class,
        'bill_id'      => Like::class,
        'created_at'      => Like::class,
        'updated_at'      => Like::class,
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'room_id',
        'user_id',
        'adults',
        'children',
        'booking_type',
        'check_in_time',
        'check_in_date',
        'check_out_time',
        'check_out_date',
        'status',
        'bill_id',
        'created_at',
        'updated_at',
    ];

    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bill()
    {
        return $this->belongsTo(RoomBill::class, 'bill_id');
    }


}
