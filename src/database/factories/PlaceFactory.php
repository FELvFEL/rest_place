<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
