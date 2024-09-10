<?php

namespace Database\Factories;

use App\Models\Anak;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PemeriksaanAnak>
 */
class PemeriksaanAnakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'anak_id' => Anak::factory(),
            'employee_id' => Employee::factory(),
            'tanggal_pemeriksaan' => fake()->dateTimeBetween('-9 month', '2 month'),
            'berat_badan' => fake()->randomFloat(1, 40, 60),
            'tinggi_badan' => fake()->randomFloat(1, 150, 170),
            'tekanan_darah' => fake()->randomNumber(3),
            'suhu_tubuh' => fake()->randomNumber(2),
            'status_imunisasi' => fake()->randomElement(['Ya', 'Tidak']),
            'riwayat_penyakit' => fake()->randomElement(['Ada', 'Tidak ada']),
            'catatan' => fake()->randomElement(['Ada', 'Tidak ada']),
        ];
    }
}
