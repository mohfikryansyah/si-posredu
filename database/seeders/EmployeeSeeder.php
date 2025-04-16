<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Employee::factory(3)->create([
            'jabatan' => 'Dokter',
        ]);

        \App\Models\Employee::factory(3)->create([
            'jabatan' => 'Perawat',
        ]);

        \App\Models\Employee::factory(4)->create([
            'jabatan' => 'Bidan',
        ]);
    }
}
