<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $connection = 'oracle';

    public function objects()
    {
        return $this->belongsToMany(Objects::class,'organizations_objects','organization_id','object_id');
    }
}
