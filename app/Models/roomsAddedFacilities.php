<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class roomsAddedFacilities extends Model
{
    use HasFactory, AsSource, Filterable, Searchable, Attachable;

    protected $fillable = [
        'name',
        'price',
        'discount',
        'count',
        'status',
    ];

    /**
     * Calculate the total price of an added facility based on its count.
     *
     * @param int $facilityId
     * @param int $count
     * @return float|int
     */
    public function calculateAddedFacilityPrice($facilityId, $count)
    {
        $addedFacility = $this->find($facilityId);

        if (!$addedFacility) {
            return 0; // Return 0 if the facility is not found
        }

        return $addedFacility->price * $count;
    }
}
