<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieRating extends Model
{
    use HasFactory;

    protected $fillable = ['movie_title', 'username', 'rating', 'r_description'];
}
