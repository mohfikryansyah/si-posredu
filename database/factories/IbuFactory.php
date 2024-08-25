<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ibu>
 */
class IbuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomDate = fake()->dateTimeBetween('-50 years', '-25 years');
        $formatDate = $randomDate->format('j F Y');
        return [
            'nama' => fake()->name(),
            'nama_suami' => fake()->name(),
            'tempat_tanggal_lahir' => fake()->city() . ', ' . $formatDate,
            'alamat' => fake()->address(),
            'no_tlp' => fake()->randomNumber(5, true),
            'pekerjaan' => fake()->jobTitle(),
            'jenis_kontrasepsi' => fake()->randomElement(['KB', 'NON-KB']),
            'golongan_darah' => fake()->randomElement(['A', 'AB', 'O', 'B']),
        ];
    }
}
