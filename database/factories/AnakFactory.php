<?php

namespace Database\Factories;

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
        $randomDate = fake()->dateTimeBetween('-2 years', '-1 years');
        $formatDate = $randomDate->format('j F Y');
        return [
            'nama' => fake()->name(),
            'tempat_tanggal_lahir' => fake()->city() . ', ' . $formatDate,
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'nama_ibu' => fake()->name(),
            'nama_ayah' => fake()->name(),
            'no_tlp' => fake()->phoneNumber(),
            'tanggal_pendaftaran' => fake()->date(),
            'alamat' => fake()->address(),
        ];
    }
}
