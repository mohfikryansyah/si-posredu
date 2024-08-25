<?php

namespace Database\Seeders;

use App\Models\Ibu;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employee;
use App\Models\IbuHamil;
use App\Models\PemeriksaanIbu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(2)->create();
        Employee::factory(3)->create();
        Ibu::factory(5)->create();
        IbuHamil::factory(10)->create();
        // PemeriksaanIbu::factory(129)->create();

        User::create([
            'name' => 'Fiqriansyah',
            'email' => 'fiqriansyah@gmail.com',
            'password' => Hash::make('fiqriansyah2001')
        ]);

    }
}
