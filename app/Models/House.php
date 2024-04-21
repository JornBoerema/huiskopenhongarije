<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class House extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'short_description',
        'description',
        'price',
        'surface',
        'bedrooms',
        'bathrooms',
        'sold',
        'surroundings',
        'is_published',
        'images',
    ];

    protected $casts = [
        'images' => 'array'
    ];
}
