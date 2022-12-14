<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;


class Event extends Eloquent
{
    protected $connection = 'oracle';

    /**
     * @return BelongsToMany
     */
    public function photos(): BelongsToMany
    {
        return $this->belongsToMany(Photo::class,'events_photos');
    }
}
