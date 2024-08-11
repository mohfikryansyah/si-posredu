<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'birthday' => fake()->dateTimeBetween('-30 years', '-25 years'),
            'join' => fake()->dateTimeBetween('-4 years'),
            'address' => fake()->address(),
        ];
    }
}
