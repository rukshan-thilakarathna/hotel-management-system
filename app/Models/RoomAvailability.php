<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class RoomAvailability extends Model
{
    use HasFactory , AsSource ,Filterable ,Attachable ,Chartable;

    public function room()
    {
        return $this->belongsTo(Rooms::class);
    }
}
