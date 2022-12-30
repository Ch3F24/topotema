<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RelatedDocuments extends Model
{
    protected $connection = 'oracle';

    public function object(): BelongsTo
    {
        return $this->belongsTo(Objects::class);
    }
}
