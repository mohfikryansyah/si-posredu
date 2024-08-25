<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IbuHamil>
 */
class IbuHamilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'usia_kehamilan' => fake()->randomNumber(1, true),
            'nomor_kehamilan' => fake()->randomNumber(1, true),
            'tanggal_persalinan' => fake()->date(),
            'penolong_persalinan' => fake()->randomElement(['Bidan', 'Dukun']),
            'kondisi_bayi' => fake()->randomElement(['Sehat', 'Tidak Sehat']),
        ];
    }
}
