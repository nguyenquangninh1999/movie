<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image',
        'title',
        'content',
        'url_video',
        'number_view',
    ];

    public function movieCategories(): HasMany
    {
        return $this->hasMany(MovieCategory::class);
    }
}
