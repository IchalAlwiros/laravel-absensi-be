<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perimission>
 */
class PermissionFactory extends Factory
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
            'user_id' => 10,
            'date_permission' => fake()->date(),
            'reason' => fake()->text(),
            'image' => fake()->imageUrl(),
            'is_approved' => fake()->boolean(),
        ];
    }
}
