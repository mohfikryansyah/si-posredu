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
            'employee_id' => Employee::factory(),
            'ibu_id' => Ibu::factory(),
            'riwayat_penyakit' => fake()->randomElement(['Tidak ada', 'Ada']),
            'tekanan_darah_sistolik' => fake()->randomNumber(3),
            'tekanan_darah_diastolik' => fake()->randomNumber(3),
            'kadar_gula_darah' => fake()->randomNumber(2),
            'kadar_kolestrol' => fake()->randomNumber(2),
            'kadar_asam_urat' => fake()->randomNumber(2),
            'berat_badan' => fake()->randomFloat(2, 40, 120),
            'tinggi_badan' => fake()->randomFloat(1, 145, 180),
            'catatan' => fake()->randomElement(['Keadaan membaik', 'Keadaan tidak membaik']),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
