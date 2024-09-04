<?php

namespace Database\Factories;

use App\Models\Remaja;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PemeriksaanRemaja>
 */
class PemeriksaanRemajaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'remaja_id' => Remaja::factory(),
            'employee_id' => Employee::factory(),
            'tanggal_pemeriksaan' => fake()->dateTimeBetween('-5 month', '+5 year'),
            'berat_badan' => fake()->randomFloat(1, 40, 60),
            'tinggi_badan' => fake()->randomFloat(1, 150, 170),
            'tekanan_darah' => fake()->randomNumber(3),
            'konseling_kesehatan' => fake()->randomElement(['Ya', 'Tidak']),
            'pemberian_vitamin' => fake()->randomElement(['Ya', 'Tidak']),
            'catatan' => fake()->randomElement(['Ada', 'Tidak ada']),
        ];
    }
}
