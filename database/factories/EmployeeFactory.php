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
        $kota = fake()->randomElement(['Gorontalo,', 'Makassar,', 'Manado,']);
        $date = fake()->dateTimeBetween('-4 years');
        $formatDate = $date->format('j F Y');
        
        return [
            'nama' => fake()->name(),
            'tempat_tanggal_lahir' => $kota . $formatDate,
            'join' => fake()->dateTimeBetween('-4 years'),
            'alamat' => fake()->address(),
        ];
    }
}
