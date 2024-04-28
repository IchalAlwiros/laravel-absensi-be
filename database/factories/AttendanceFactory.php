<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => 1,
            'date' => fake()->date(),
            'time_in' => fake()->time(),
            'time_out' => fake()->time(),
            'latlng_in' => fake()->latitude() . ',' . fake()->longitude(),
            'latlng_out' => fake()->latitude() . ',' . fake()->longitude(),
        ];
    }
}
