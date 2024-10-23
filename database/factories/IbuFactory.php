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
        $kodeWilayah = fake()->numberBetween(100000, 999999);
        $tanggalLahir = fake()->dateTimeBetween('-70 years', '-17 years')->format('dmY');
        $randomDigits = fake()->numberBetween(1000, 9999);
        $nik = $kodeWilayah . substr($tanggalLahir, 0, 6) . $randomDigits;
        $randomDate = fake()->dateTimeBetween('-50 years', '-25 years');
        $formatDate = $randomDate->format('j F Y');
        return [
            'nama' => fake()->name(),
            'nik' => $nik,
            'nama_suami' => fake()->name(),
            'tempat_tanggal_lahir' => fake()->city() . ', ' . $formatDate,
            'golongan_darah' => fake()->randomElement(['A', 'AB', 'O', 'B']),
            'nomor_kehamilan' => fake()->randomElement(['1', '2', '3', '4']),
            'alamat' => fake()->address(),
            'no_tlp' => fake()->randomNumber(5, true),
            'pekerjaan' => fake()->jobTitle(),
            'tanggal_pendaftaran' => fake()->date(),
        ];
    }
}
