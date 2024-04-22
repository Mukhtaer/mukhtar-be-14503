<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Http\Controllers\HelperController;

class GenreController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'genre' => 'sometimes|required|string',
        ]);

        // Check if genre parameter is provided
        if (!$request->has('genre')) {
            // If not provided, return error response
            return response()->json(['error' => 'Please provide the genre'], 400);
        }

        $genre = Str::lower($request->input('genre'));
        $movies = Movie::whereRaw('LOWER(genres) LIKE ?', ['%"' . strtolower($genre) . '"%'])->get();

        $formattedMovies =  [];
        foreach ($movies as $movie) {
            $formattedMovies[] = $this->formatMovie($movie, $genre);
        }

        return response()->json(['data' => $formattedMovies]);
    }

    function formatMovie($movie, $genre)
    {
        return [
            'Movie_ID' => $movie->id,
            'Title' => $movie->title,
            'Genre' => $genre,
            'Duration' =>   HelperController::convertLengthToHours($movie->length),
            'Views' => HelperController::convertViewToKM($movie->views),
            'Poster' => $movie->poster,
            'Overall_rating' => $movie->overall_rating,
            'Description' => $movie->description,
        ];
    }
}
