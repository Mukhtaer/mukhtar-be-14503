<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genre',
        'director',
        'release_date',
        'runtime',
        'rating',
        'description',
    ];

    protected $casts = [
        'release_date' => 'datetime',
    ];
}
