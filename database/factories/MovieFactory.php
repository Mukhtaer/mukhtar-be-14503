<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'release_date' => $this->faker->date(),
            'length' => $this->faker->numberBetween(60, 180),
            'description' => $this->faker->paragraph,
            'mpaa_rating' => $this->faker->randomElement(['G', 'PG', 'PG-13', 'R', 'NC-17']),
            'overall_rating' => $this->faker->randomFloat(1, 0, 5),
            'genres' => json_encode($this->faker->randomElements(['Action', 'Comedy', 'Drama', 'Horror', 'Mystery', 'Romance', 'Thriller'], $this->faker->numberBetween(1, 3))),
            'performers' => json_encode($this->faker->randomElements(['Actor 1', 'Actor 2', 'Actor 3', 'Actor 4', 'Actor 5'], $this->faker->numberBetween(1, 5))),
            'language' => $this->faker->randomElement(['English', 'Spanish', 'French', 'German', 'Italian', 'Japanese', 'Korean', 'Mandarin', 'Russian']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
