<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $connection = 'oracle';

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class,'events_photos');
    }
}
