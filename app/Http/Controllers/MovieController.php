<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Str;

class MovieController extends Controller
{

    public function add_movie(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'release' => 'required|date',
            'length' => 'required|integer',
            'description' => 'required|string',
            'mpaa_rating' => 'required|string',
            'genre' => 'required|array',
            'director' => 'required|string',
            'performer' => 'required|array',
            'language' => 'required|string',
        ]);

        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->release_date = $request->input('release');
        $movie->length = $request->input('length');
        $movie->description = $request->input('description');
        $movie->mpaa_rating = $request->input('mpaa_rating');
        $movie->genres = json_encode($request->input('genre'));
        $movie->director = $request->input('director');
        $movie->performers = json_encode($request->input('performer'));
        $movie->language = $request->input('language');
        $movie->save();

        $movie_id = $movie->id;

        return response()->json(['message' => "Successfully added movie The King's Man with Movie_ID " . $movie_id, 'success' => true]);
    }


    public function search_performer(Request $request)
    {
        $request->validate([
            'performer_name' => 'sometimes|required|string',
        ]);

        if (!$request->has('performer_name')) {
            return response()->json(['error' => 'Please provide the performer'], 400);
        }

        $performer = Str::lower($request->input('performer_name'));

        $movies = Movie::whereRaw("LOWER(performers) LIKE ?", ['%"' . strtolower($performer) . '"%'])->get();

        $formattedMovies =  [];
        foreach ($movies as $movie) {
            $formattedMovies[] = $this->formatMovie($movie);
        }

        return response()->json(['data' => $formattedMovies]);
    }


    public function new_movies(Request $request)
    {
        $request->validate([
            'r_date' => 'sometimes|required|string',
        ]);

        if (!$request->has('r_date')) {
            return response()->json(['error' => 'Please provide the release date'], 400);
        }

        $release_date = $request->input('r_date');

        $movies = Movie::where('release_date', '<=', $release_date)
            ->orderByRaw('ABS(DATEDIFF(release_date, ?))', [$release_date])
            ->get();


        $formattedMovies =  [];
        foreach ($movies as $movie) {
            $formattedMovies[] = $this->formatMovieR($movie);
        }

        return response()->json(['data' => $formattedMovies]);
    }
    function formatMovie($movie)
    {
        $genres = json_decode($movie->genres);
        $firstGenre = isset($genres[0]) ? $genres[0] : null;
        return [
            'Movie_ID' => $movie->id,
            'Overall_rating' => $movie->overall_rating,
            'Title' => $movie->title,
            'Description' => $movie->description,
            'Duration' => HelperController::convertLengthToHours($movie->length),
            'Views' => HelperController::convertViewToKM($movie->views),
            'Genre' => $firstGenre,
            'Poster' => $movie->poster,
        ];
    }

    function formatMovieR($movie)
    {
        $genres = json_decode($movie->genres);
        $firstGenre = isset($genres[0]) ? $genres[0] : null;
        return [
            'Movie_ID' => $movie->id,
            'Title' => $movie->title,
            'Genre' => $firstGenre,
            'Duration' => HelperController::convertLengthToHours($movie->length),
            'Views' => HelperController::convertViewToKM($movie->views),
            'Poster' => $movie->poster,
            'Overall_rating' => $movie->overall_rating,
            'Description' => $movie->description,
        ];
    }
}
