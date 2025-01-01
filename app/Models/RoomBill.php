<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;

class RoomBill extends Model
{
    use HasFactory , AsSource , Attachable;

    protected $table = 'room_bills';

    protected $fillable = [
        'room_id',
        'user_id',
        'user_name',
        'user_mobile_number',
        'added_charges',
        'defult_charges',
        'other_charges',
        'total_charges',
        'discount',
        'status',
        'payment_status',
    ];

    // Relationships
    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
