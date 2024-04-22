<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MovieRating;

class MovieRatingsController extends Controller
{
    public function add_rating(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'movie_title' => 'required|string',
            'username' => 'required|string',
            'rating' => 'required|integer|min:1|max:10',
            'r_description' => 'nullable|string',
        ]);

        // Create or update the movie rating
        $movieTitle = $request->input('movie_title');
        $username = $request->input('username');
        $rating = $request->input('rating');
        $description = $request->input('r_description');

        $movieRating = MovieRating::updateOrCreate(
            ['movie_title' => $movieTitle, 'username' => $username],
            ['rating' => $rating, 'r_description' => $description]
        );

        // Check if the rating/review was successfully added
        if ($movieRating) {
            return response()->json(['message' => 'Successfully added review for the ' . $movieTitle . ' by the user: ' . $username, 'success' => true]);
        } else {
            return response()->json(['error' => 'Failed to add rating/review.'], 500);
        }
    }
}
