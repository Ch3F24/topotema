<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Address extends Model
{
    protected $connection = 'oracle';

    /**
     * @return BelongsToMany
     */
    public function objects(): BelongsToMany
    {
        return $this->belongsToMany(Objects::class,'addresses_objects','address_id','object_id');
    }

    public function getAddressAttribute()
    {
        return $this->city . ', ' . $this->public_place_name . ' ' . $this->public_place_type . ' ' . $this->houseno . ', ' . $this->postal_code;
    }
}
