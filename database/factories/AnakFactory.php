<?php

namespace Database\Factories;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anak>
 */
class AnakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kodeWilayah = fake()->numberBetween(100000, 999999);
        $tanggalLahir = fake()->dateTimeBetween('-70 years', '-17 years')->format('dmY');
        $randomDigits = fake()->numberBetween(1000, 9999);
        $nik = $kodeWilayah . substr($tanggalLahir, 0, 6) . $randomDigits;
        $randomDate = fake()->dateTimeBetween('-2 years', '-1 years');
        $formatDate = $randomDate->format('j F Y');
        return [
            'nama' => fake()->name(),
            'nik' => $nik,
            'tempat_tanggal_lahir' => fake()->city() . ', ' . $formatDate,
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'nama_ibu' => fake()->name(),
            'nama_ayah' => fake()->name(),
            'no_tlp' => fake()->phoneNumber(),
            'tanggal_pendaftaran' => fake()->date(
                'Y-m-d',
                '2024-12-31',
                '2024-01-01'
            ),
            'alamat' => fake()->address(),
        ];
    }
}
