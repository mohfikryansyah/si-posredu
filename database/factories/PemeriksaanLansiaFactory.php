<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Lansia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PemeriksaanLansia>
 */
class PemeriksaanLansiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lansia_id' => Lansia::factory(),
            'employee_id' => Employee::factory(),
            'tanggal_pemeriksaan' => fake()->dateTimeBetween('-10month'),
            'tekanan_darah' => fake()->randomNumber(3),
            // 'suhu_tubuh' => fake()->randomNumber(2),
            'kolestrol' => fake()->randomNumber(2),
            'asam_urat' => fake()->randomNumber(2),
            'gula_darah' => fake()->randomNumber(2),
            'catatan' => fake()->randomElement(['Ada', 'Tidak ada']),
        ];
    }
}
