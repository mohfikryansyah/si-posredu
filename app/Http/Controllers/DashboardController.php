<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PemeriksaanIbu;
use App\Models\PemeriksaanAnak;
use App\Models\PemeriksaanLansia;
use App\Models\PemeriksaanRemaja;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $currentYear = now()->year;
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        $dataIbu = [];
        $dataAnak = [];
        $dataRemaja = [];
        $dataLansia = [];

        foreach (range(1, 12) as $month) {
            $dataIbu[] = PemeriksaanIbu::whereYear('tanggal_pemeriksaan', $currentYear)->whereMonth('tanggal_pemeriksaan', $month)->count();

            $dataAnak[] = PemeriksaanAnak::whereYear('tanggal_pemeriksaan', $currentYear)->whereMonth('tanggal_pemeriksaan', $month)->count();

            $dataRemaja[] = PemeriksaanRemaja::whereYear('tanggal_pemeriksaan', $currentYear)->whereMonth('tanggal_pemeriksaan', $month)->count();

            $dataLansia[] = PemeriksaanLansia::whereYear('tanggal_pemeriksaan', $currentYear)->whereMonth('tanggal_pemeriksaan', $month)->count();
        }

        $dataIbus = PemeriksaanIbu::count();
        $dataAnaks = PemeriksaanAnak::count();
        $dataRemajas = PemeriksaanRemaja::count();
        $dataLansias = PemeriksaanLansia::count();

        $data = [
            'ibu' => $dataIbus,
            'anak' => $dataAnaks,
            'remaja' => $dataRemajas,
            'lansia' => $dataLansias,
        ];
        // dd($data);

        // Menghitung jumlah pemeriksaan ibu bulan ini
        $pemeriksaanBulanIni = PemeriksaanIbu::whereMonth('tanggal_pemeriksaan', now()->month)
            ->whereYear('tanggal_pemeriksaan', now()->year)
            ->count();

        // dd($pemeriksaanBulanIni);

        // Menghitung jumlah pemeriksaan ibu bulan kemarin
        $pemeriksaanBulanKemarin = PemeriksaanIbu::whereMonth('tanggal_pemeriksaan', now()->subMonth()->month)
            ->whereYear('tanggal_pemeriksaan', now()->subMonth()->year)
            ->count();

        // dd($pemeriksaanBulanKemarin);

        // Menghitung persentase perubahan dari bulan kemarin ke bulan ini
        if ($pemeriksaanBulanKemarin == 0) {
            $persentasePerubahan = $pemeriksaanBulanIni > 0 ? 100 : 0;
        } else {
            $persentasePerubahan = (($pemeriksaanBulanIni - $pemeriksaanBulanKemarin) / $pemeriksaanBulanKemarin) * 100;
        }

        return view('dashboard', [
            'user' => User::all(),
            'data' => $data,
            'persentasePerubahan' => $persentasePerubahan,
            'pemeriksaanBulanIni' => $pemeriksaanBulanIni,
            'months' => $months,
            'dataIbu' => $dataIbu,
            'dataAnak' => $dataAnak,
            'dataRemaja' => $dataRemaja,
            'dataLansia' => $dataLansia,
        ]);
    }
}
