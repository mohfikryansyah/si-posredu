<?php

namespace App\Http\Controllers;

use App\Models\Ibu;
use App\Models\Anak;
use App\Models\Post;
use App\Models\Lansia;
use App\Models\Remaja;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Pelayanan;
use App\Models\AppSetting;
use Illuminate\Http\Request;
use App\Models\PemeriksaanIbu;
use App\Models\PemeriksaanAnak;
use App\Models\PemeriksaanLansia;
use App\Models\PemeriksaanRemaja;

class HomeController extends Controller
{
    public function index()
    {
        $currentYear = now()->year;
        $months = $this->getMonths();

        $dataIbu = $this->getMonthlyData(PemeriksaanIbu::class, $currentYear);
        $dataAnak = $this->getMonthlyData(PemeriksaanAnak::class, $currentYear);
        $dataRemaja = $this->getMonthlyData(PemeriksaanRemaja::class, $currentYear);
        $dataLansia = $this->getMonthlyData(PemeriksaanLansia::class, $currentYear);

        $pemeriksaanBulanIni = [
            'ibu' => $this->getCurrentMonthData(PemeriksaanIbu::class),
            'anak' => $this->getCurrentMonthData(PemeriksaanAnak::class),
            'remaja' => $this->getCurrentMonthData(PemeriksaanRemaja::class),
            'lansia' => $this->getCurrentMonthData(PemeriksaanLansia::class),
        ];

        $dataPetugas = [111, 121, 125, 135, 145, 155, 165];
        $data = json_encode($dataPetugas);

        return view('home', [
            'galleries' => Gallery::all(),
            'data' => $data,
            'pelayanans' => Pelayanan::latest()->take(2)->get(),
            'posts' => Post::with('category')->latest()->take(8)->get(),
            'app' => AppSetting::first(),
            // 'dataPemeriksaan' => $this->getAllPemeriksaan(),
            'dataPemeriksaan' => $this->getTotalDataPemeriksaan(),
            'dataRegistrasi' => $this->getTotalDataRegistrasi(),
            'pemeriksaanBulanIni' => $pemeriksaanBulanIni,
            'months' => $months,
            'dataIbu' => $dataIbu,
            'dataAnak' => $dataAnak,
            'dataRemaja' => $dataRemaja,
            'dataLansia' => $dataLansia,
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

    private function getMonths()
    {
        return ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    }

    private function getMonthlyData($model, $year)
    {
        $data = [];
        foreach (range(1, 12) as $month) {
            $data[] = $model::whereYear('tanggal_pemeriksaan', $year)->whereMonth('tanggal_pemeriksaan', $month)->count();
        }
        return $data;
    }

    private function getTotalDataPemeriksaan()
    {
        return [
            'ibu' => PemeriksaanIbu::count(),
            'anak' => PemeriksaanAnak::count(),
            'remaja' => PemeriksaanRemaja::count(),
            'lansia' => PemeriksaanLansia::count(),
        ];
    }

    private function getTotalDataRegistrasi()
    {
        return [
            'ibu' => Ibu::count(),
            'anak' => Anak::count(),
            'remaja' => Remaja::count(),
            'lansia' => Lansia::count(),
        ];
    }

    private function getCurrentMonthData($model)
    {
        return $model
            ::whereMonth('tanggal_pemeriksaan', now()->month)
            ->whereYear('tanggal_pemeriksaan', now()->year)
            ->count();
    }

    private function getPercentageChange($model)
    {
        $currentMonthData = $this->getCurrentMonthData($model);
        $lastMonthData = $model
            ::whereMonth('tanggal_pemeriksaan', now()->subMonth()->month)
            ->whereYear('tanggal_pemeriksaan', now()->subMonth()->year)
            ->count();

        if ($lastMonthData == 0) {
            return $currentMonthData > 0 ? 100 : 0;
        }

        return (($currentMonthData - $lastMonthData) / $lastMonthData) * 100;
    }
}
