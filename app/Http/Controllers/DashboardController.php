<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PemeriksaanIbu;

class DashboardController extends Controller
{
    public function index()
    {
        // Data untuk petugas
        $dataPetugas = [111, 121, 125, 135, 145, 155, 165];
        $data = json_encode($dataPetugas);

        // Menghitung jumlah pemeriksaan ibu bulan ini
        $pemeriksaanBulanIni = PemeriksaanIbu::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // dd($pemeriksaanBulanIni);
        
        
        // Menghitung jumlah pemeriksaan ibu bulan kemarin
        $pemeriksaanBulanKemarin = PemeriksaanIbu::whereMonth('created_at', now()->subMonth()->month)
        ->whereYear('created_at', now()->subMonth()->year)
        ->count();
        // dd($pemeriksaanBulanKemarin);
        
        // Menghitung persentase pencapaian target bulan ini
        // $persentasePemeriksaanIbu = ($pemeriksaanBulanIni / $target) * 100;
        
        // Menghitung persentase perubahan dari bulan kemarin ke bulan ini
        if ($pemeriksaanBulanKemarin == 0) {
            $persentasePerubahan = $pemeriksaanBulanIni > 0 ? 100 : 0;
        } else {
            $persentasePerubahan = (($pemeriksaanBulanIni - $pemeriksaanBulanKemarin) / $pemeriksaanBulanKemarin) * 100;
        }

        // dd($persentasePerubahan);

        // Mengembalikan data ke view
        return view('dashboard', [
            'user' => User::all(),
            'data' => $data,
            'persentasePerubahan' => $persentasePerubahan,
            'pemeriksaanBulanIni' => $pemeriksaanBulanIni,
        ]);
    }
}
