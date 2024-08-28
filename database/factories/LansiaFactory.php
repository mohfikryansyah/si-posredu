<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lansia>
 */
class LansiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomDate = fake()->dateTimeBetween('-70 years', '-60 years');
        $formatDate = $randomDate->format('j F Y');
        $no_tlp = '+6282290';
        return [
            'nama' => fake()->name(),
            'tempat_tanggal_lahir' => fake()->city() . ', ' . $formatDate,
            'golongan_darah' => fake()->randomElement(['A', 'AB', 'O', 'B']),
            'alamat' => fake()->address(),
            'no_tlp' => $no_tlp . fake()->randomNumber(5, true),
            'pekerjaan' => fake()->jobTitle(),
        ];
    }
}
