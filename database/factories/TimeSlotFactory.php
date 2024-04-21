<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimeSlot>
 */
class TimeSlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'theater_name' => $this->faker->company,
            'start_time' => $this->faker->dateTimeBetween('now', '+30 days'),
            'end_time' => $this->faker->dateTimeBetween('now', '+60 days'),
            'theater_room_no' => $this->faker->randomNumber(2),
            'movie_id' => $this->faker->numberBetween(1, 30),
        ];
    }
}
