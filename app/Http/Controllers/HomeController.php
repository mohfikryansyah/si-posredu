<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\Post;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Pelayanan;
use Illuminate\Http\Request;
use App\Models\PemeriksaanIbu;
use App\Models\PemeriksaanAnak;
use App\Models\PemeriksaanLansia;
use App\Models\PemeriksaanRemaja;

class HomeController extends Controller
{
    public function index()
    {
        $dataPetugas = [111, 121, 125, 135, 145, 155, 165];
        $data = json_encode($dataPetugas);
        return view('home', [
            'galleries' => Gallery::all(),
            'data' => $data,
            'pelayanans' => Pelayanan::latest()->take(2)->get(),
            'posts' => Post::with('category')->latest()->take(8)->get(),
            'app' => AppSetting::first(),
            'dataPemeriksaan' => $this->getAllPemeriksaan(),
        ]);
    }

    private function getAllPemeriksaan()
    {
        return [
            'ibu' => PemeriksaanIbu::count(),
            'remaja' => PemeriksaanRemaja::count(),
            'lansia' => PemeriksaanLansia::count(),
            'anak' => PemeriksaanAnak::count(),
        ];
    }
}
