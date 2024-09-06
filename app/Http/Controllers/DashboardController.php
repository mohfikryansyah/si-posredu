<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ibu;
use App\Models\Anak;
use App\Models\User;
use App\Models\Lansia;
use App\Models\Remaja;
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

        // Menghitung persentase perubahan pemeriksaan ibu
        $persentasePerubahan = $this->getPercentageChange(PemeriksaanIbu::class);

        return view('dashboard', [
            'user' => User::all(),
            'dataPemeriksaan' => $this->getTotalDataPemeriksaan(),
            'dataRegistrasi' => $this->getTotalDataRegistrasi(),
            'persentasePerubahan' => $persentasePerubahan,
            'pemeriksaanBulanIni' => $pemeriksaanBulanIni,
            'months' => $months,
            'dataIbu' => $dataIbu,
            'dataAnak' => $dataAnak,
            'dataRemaja' => $dataRemaja,
            'dataLansia' => $dataLansia,
        ]);
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
