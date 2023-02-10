<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FacultyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->faculty(),
            'department' => fake()->randomElement(['pre-school', 'elementary', 'highschool', 'senior-highschool']),
            'status' => fake()->randomElement(['active', 'pending'])
        ];
    }
}
