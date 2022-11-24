<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Objects extends Model
{
    protected $connection = 'oracle';

    /**
     * @return BelongsToMany
     */
    public function addresses(): BelongsToMany
    {
        return $this->belongsToMany(Address::class,'addresses_objects','object_id');
    }

    public function address()
    {
        return $this->addresses()->where('parent_address_id',false);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'categories_objects','object_id');
    }

    public function category()
    {
        return $this->categories()->where('parent_id',false);
    }

    public function organizations()
    {
        return $this->belongsToMany(Organization::class,'organizations_objects','object_id','organization_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class,'subjects_objects','object_id','subject_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class,'object_id');
    }
}
