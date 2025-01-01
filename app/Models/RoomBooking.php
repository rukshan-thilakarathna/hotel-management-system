<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class RoomBooking extends Model
{
    use HasFactory ,AsSource ,Searchable ,Filterable ,Attachable;

    protected $fillable = [
        'id' ,
        'created_at',  
        'updateed_at', 
    ];

    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
