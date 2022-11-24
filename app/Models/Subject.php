<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    protected $connection = 'oracle';

    /**
     * @return BelongsToMany
     */
    public function objects(): BelongsToMany
    {
        return $this->belongsToMany(Objects::class,'subjects_objects','subject_id','object_id');
    }
}
