<?php

namespace Database\Seeders;

use App\Models\Anak;
use App\Models\AppSetting;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Ibu;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employee;
use App\Models\IbuHamil;
use App\Models\Lansia;
use App\Models\PemeriksaanAnak;
use App\Models\PemeriksaanIbu;
use App\Models\PemeriksaanLansia;
use App\Models\PemeriksaanRemaja;
use App\Models\Post;
use App\Models\Remaja;
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
        Ibu::factory(50)->create();
        PemeriksaanIbu::factory(192)->create();
        PemeriksaanLansia::factory(156)->create();
        PemeriksaanAnak::factory(187)->create();
        PemeriksaanRemaja::factory(120)->create();
        Anak::factory(10)->create();
        Lansia::factory(50)->create();
        Remaja::factory(50)->create();
        Post::factory(50)->create();
        Contact::factory(1)->create();

        User::create([
            'name' => 'Fiqriansyah',
            'email' => 'fiqriansyah@gmail.com',
            'password' => Hash::make('fiqriansyah2001')
        ]);

        AppSetting::create([
            'app_name' => 'POSREDU',
            'visi' => '"Menjadi pusat layanan kesehatan yang unggul dan terpercaya dalam memberikan perawatan holistik untuk anak, ibu hamil, remaja, dan lansia, guna meningkatkan kualitas hidup dan kesejahteraan komunitas."',
            'misi1' => 'Memberikan layanan kesehatan berkualitas: Menyediakan layanan kesehatan yang komprehensif dan berkualitas tinggi untuk anak, ibu hamil, remaja, dan lansia dengan pendekatan yang berpusat pada pasien.',
            'misi2' => 'Memberikan layanan kesehatan berkualitas: Menyediakan layanan kesehatan yang komprehensif dan berkualitas tinggi untuk anak, ibu hamil, remaja, dan lansia dengan pendekatan yang berpusat pada pasien.',
            'misi3' => 'Memberikan layanan kesehatan berkualitas: Menyediakan layanan kesehatan yang komprehensif dan berkualitas tinggi untuk anak, ibu hamil, remaja, dan lansia dengan pendekatan yang berpusat pada pasien.',
            'lokasi' => 'Bunto, Kec. Popayato Tim., Kabupaten Pohuwato, Gorontalo 96467',
            'email' => 'admin@posredu.com',
            'no_tlp' => '082290142211',
        ]);

    }
}
