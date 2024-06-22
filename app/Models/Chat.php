<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image',
        'video',
        'title',
        'content',
        'category',
        'pay',
        'zalo',
        'birthday',
        'height',
        'weight',
        'work',
        'price',
        'telegram'
    ];
}
