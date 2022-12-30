<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * @return BelongsToMany
     */
    public function address(): BelongsToMany
    {
        return $this->addresses()->where('parent_address_id',false);
    }

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'categories_objects','object_id');
    }

    /**
     * @return BelongsToMany
     */
    public function category(): BelongsToMany
    {
        return $this->categories()->where('parent_id',false);
    }

    /**
     * @return BelongsToMany
     */
    public function organizations(): BelongsToMany
    {
        return $this->belongsToMany(Organization::class,'organizations_objects','object_id','organization_id');
    }

    /**
     * @return BelongsToMany
     */
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class,'subjects_objects','object_id','subject_id');
    }

    /**
     * @return HasMany
     */
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class,'object_id');
    }

    /**
     * @return HasMany
     */
    public function documents(): HasMany
    {
        return $this->hasMany(RelatedDocuments::class,'object_id');
    }

    /**
     * @return HasMany
     */
    public function memoirs(): HasMany
    {
        return $this->hasMany(Memoir::class,'object_id');
    }

    /**
     * @return BelongsToMany
     */
    public function videos(): BelongsToMany
    {
        return $this->belongsToMany(Video::class,'objects_videos','object_id','video_id');
    }
}
