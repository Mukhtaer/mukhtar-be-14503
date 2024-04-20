<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Movie::create([
            [
                'title' => 'The Shawshank Redemption',
                'release_date' => '1994-09-14',
                'length' => 142,
                'description' => 'Two imprisoned',
                'mpaa_rating' => 'R',
                'overall_rating' => 9.3,
                'genres' => ['Drama'],
                'performers' => ['Tim Robbins', 'Morgan Freeman'],
                'language' => 'English',
            ],
            [
                'title' => 'The Godfather',
                'release_date' => '1972-03-24',
                'length' => 175,
                'description' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
                'mpaa_rating' => 'R',
                'overall_rating' => 9.2,
                'genres' => ['Crime', 'Drama'],
                'performers' => ['Marlon Brando', 'Al Pacino'],
                'language' => 'English',
            ],
            [
                'title' => 'The Dark Knight',
                'release_date' => '2008-07-18',
                'length' => 152,
                'description' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',
                'mpaa_rating' => 'PG-13',
                'overall_rating' => 9.0,
                'genres' => ['Action', 'Crime', 'Drama'],
                'performers' => ['Christian Bale', 'Heath Ledger'],
                'language' => 'English',
            ],
        ]);
    }
}
