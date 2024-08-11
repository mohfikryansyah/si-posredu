<?php

namespace Database\Seeders;

use App\Models\Ibu;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(12)->create();
        Employee::factory(100)->create();
        Ibu::factory(100)->create();

        User::create([
            'name' => 'Fiqriansyah',
            'email' => 'fiqriansyah@gmail.com',
            'password' => Hash::make('fiqriansyah2001')
        ]);

    }
}
