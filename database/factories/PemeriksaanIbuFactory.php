<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Ibu;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PemeriksaanIbu>
 */
class PemeriksaanIbuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isThisMonth = $this->faker->boolean(67); // 75% chance for this month

        if ($isThisMonth) {
            $createdAt = $this->faker->dateTimeBetween(Carbon::now()->startOfMonth(), Carbon::now());
        } else {
            $createdAt = $this->faker->dateTimeBetween(Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth());
        }


        return [
            'ibu_id' => Ibu::factory(),
            'employee_id' => Employee::factory(),
            'tanggal_pemeriksaan' => fake()->dateTimeBetween('-5 month', '+5 year'),
            'usia_kehamilan' => fake()->randomNumber(2),
            'tekanan_darah' => fake()->randomNumber(3),
            'berat_badan' => fake()->randomFloat(1, 40, 120),
            'tinggi_badan' => fake()->randomFloat(1, 40, 120),
            'lingkar_lengan_atas' => fake()->numberBetween(10, 20),
            'pemeriksaan_lab' => fake()->word(),
            'suntik_tetanus_toksoid' => fake()->randomElement(['Ya', 'Tidak']),
            'tinggi_fundus' => fake()->randomFloat(1, 10, 20),
            'denyut_jantung_janin' => fake()->numberBetween(80, 120),
            'keluhan' => fake()->randomElement(['Ada Keluhan', 'Tidak ada Keluhan']),
            'pemberian_vitamin' => fake()->randomElement(['Ya', 'Tidak']),
            'catatan' => fake()->randomElement(['Keadaan membaik', 'Keadaan tidak membaik']),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
