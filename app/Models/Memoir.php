<?php

namespace App\Models;

use App\Traits\HasDate;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Memoir extends Model
{
    use HasDate;

    protected $connection = 'oracle';

    protected $appends = [
        'date_from',
        'date_to'
    ];

    public function object()
    {
        return $this->belongsTo(Objects::class);
    }

    protected function dateFrom(): Attribute
    {
        return new Attribute(
            get: fn() => $this->getDate($this->memoir_date_from_start,$this->memoir_date_from_end)
        );
    }

    protected function dateTo(): Attribute
    {
        return new Attribute(
            get: fn() => $this->getDate($this->memoir_date_to_start,$this->memoir_date_to_end)
        );
    }
}
