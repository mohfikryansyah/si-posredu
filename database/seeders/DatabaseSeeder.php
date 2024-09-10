<?php

namespace Database\Seeders;

use App\Models\Ibu;
use App\Models\Anak;
use App\Models\Post;
use App\Models\User;
use App\Models\Lansia;
use App\Models\Remaja;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Employee;
use App\Models\IbuHamil;
use App\Models\AppSetting;
use App\Models\PemeriksaanIbu;
use App\Models\PemeriksaanAnak;
use Illuminate\Database\Seeder;
use App\Models\PemeriksaanLansia;
use App\Models\PemeriksaanRemaja;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'KADER']);
        Role::create(['name' => 'ADMIN']);
        Role::create(['name' => 'MASYARAKAT']);

        // User::factory(2)->create();
        // Employee::factory(3)->create();
        // Ibu::factory(1)->create();
        PemeriksaanIbu::factory(129)->create();
        PemeriksaanLansia::factory(139)->create();
        PemeriksaanAnak::factory(179)->create();
        PemeriksaanRemaja::factory(159)->create();
        // Anak::factory(10)->create();
        // Lansia::factory(1)->create();
        // Remaja::factory(1)->create();
        // Post::factory(50)->create();
        // Contact::factory(1)->create();

        $user = User::create([
            'name' => 'Admin',
            'email' => 'adminposredu@gmail.com',
            'password' => Hash::make('adminposredu')
        ]);

        $user->assignRole('ADMIN');

        AppSetting::create([
            'app_name' => 'POSREDU',
            'visi' => '"Menjadi pusat layanan kesehatan yang unggul dan terpercaya dalam memberikan perawatan holistik untuk anak, ibu hamil, remaja, dan lansia, guna meningkatkan kualitas hidup dan kesejahteraan komunitas."',
            'misi1' => 'Memberikan layanan kesehatan berkualitas: Menyediakan layanan kesehatan yang komprehensif dan berkualitas tinggi untuk anak, ibu hamil, remaja, dan lansia dengan pendekatan yang berpusat pada pasien.',
            'misi2' => 'Inovasi dan perbaikan berkelanjutan: Mengadopsi teknologi terbaru dan praktik terbaik dalam pelayanan kesehatan untuk memastikan perbaikan berkelanjutan dan inovasi dalam layanan kami.',
            'misi3' => 'Meningkatkan aksesibilitas dan pendidikan kesehatan: Mengedukasi masyarakat tentang kesehatan dan menyediakan akses yang lebih baik ke layanan kesehatan yang mereka butuhkan.',
            'lokasi' => 'Bunto, Kec. Popayato Tim., Kabupaten Pohuwato, Gorontalo 96467',
            'email' => 'admin@posredu.com',
            'no_tlp' => '082290142211',
        ]);

    }
}
