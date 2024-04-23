<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'movie_id',
        'category_id',
    ];
}
