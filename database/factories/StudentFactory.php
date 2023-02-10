<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->student(),
            'status' => 'pending',
            'student_id' => fake()->randomNumber(5, true) . fake()->randomNumber(5, true),
            'department' => fake()->randomElement(['pre-school', 'elementary', 'highschool', 'senior_highschool']),
            'contact_number' => "09" . fake()->randomNumber(9, true),
        ];
    }

    public function preSchool()
    {
        return $this->state(fn (array $attributes) => [
            'department' => 'pre-school'
        ]);
    }

    public function elementary()
    {
        return $this->state(fn (array $attributes) => [
            'department' => 'elementary'
        ]);
    }

    public function highschool()
    {
        return $this->state(fn (array $attributes) => [
            'department' => 'highschool'
        ]);
    }

    public function seniorHighschool()
    {
        return $this->state(fn (array $attributes) => [
            'department' => 'senior-highschool'
        ]);
    }
}
