<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Remaja>
 */
class RemajaFactory extends Factory
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
        $randomDate = fake()->dateTimeBetween('-70 years', '-60 years');
        $formatDate = $randomDate->format('j F Y');
        $no_tlp = '0822901';
        return [
            'nama' => fake()->name(),
            'nik' => $nik,
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'tempat_tanggal_lahir' => fake()->city() . ', ' . $formatDate,
            'usia' => fake()->numberBetween(14, 17),
            'alamat' => fake()->address(),
            'no_tlp' => $no_tlp . fake()->randomNumber(5, true),
            'nama_orang_tua' => fake()->name(),
            'pekerjaan_orang_tua' => fake()->jobTitle(),
            'golongan_darah' => fake()->randomElement(['A', 'AB', 'O', 'B']),
            'tanggal_pendaftaran' => fake()->date(),
        ];
    }
}
