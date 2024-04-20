<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => [
                [
                    'id' => 1,
                    'title' => 'The Shawshank Redemption',
                    'release_date' => '1994-09-14',
                    'length' => 142,
                    'description' => 'Two imprisoned'
                ],
                [
                    'id' => 2,
                    'title' => 'The Godfather',
                    'release_date' => '1972-03-24',
                    'length' => 175,
                    'description' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.'
                ],
                [
                    'id' => 3,
                    'title' => 'The Dark Knight',
                    'release_date' => '2008-07-18',
                    'length' => 152,
                    'description' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.'
                ],
                [
                    'id' => 4,
                    'title' => '12 Angry',
                    'release_date' => '1957-04-10',
                    'length' => 96,
                    'description' => 'A jury holdout attempts to prevent a miscarriage of justice by forcing his colleagues to reconsider the evidence.'
                ],

            ]
        ]);
    }
}
