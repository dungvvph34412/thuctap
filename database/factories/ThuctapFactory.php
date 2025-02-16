<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thuctap>
 */
class ThuctapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'avatar' => fake()->imageUrl(640, 480),
            'birthday' => fake()->date('Y-m-d'),
            'biography' => fake()->word(),
        ];
    }
}
