<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lokasi' => 'Bunto, Kec. Popayato Tim., Kabupaten Pohuwato, Gorontalo 96467',
            'email' => 'admin@gmail.com',
            'no_tlp' => '082252981242',
        ];
    }
}
