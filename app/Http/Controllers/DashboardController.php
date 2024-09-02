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
        $currentYear = Carbon::now()->year + 4;

        // Mengambil data pemeriksaan anak per tahun
        $pemeriksaanAnakPerTahun = PemeriksaanAnak::select(DB::raw('YEAR(tanggal_pemeriksaan) as year'), DB::raw('count(*) as total'))
            ->whereBetween(DB::raw('YEAR(tanggal_pemeriksaan)'), [$currentYear - 5, $currentYear])
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();

        // Mengambil data pemeriksaan ibu per tahun
        $pemeriksaanIbuPerTahun = PemeriksaanIbu::select(DB::raw('YEAR(tanggal_pemeriksaan) as year'), DB::raw('count(*) as total'))
            ->whereBetween(DB::raw('YEAR(tanggal_pemeriksaan)'), [$currentYear - 5, $currentYear])
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();

        // Mengambil data pemeriksaan lansia per tahun
        $pemeriksaanLansiaPerTahun = PemeriksaanLansia::select(DB::raw('YEAR(tanggal_pemeriksaan) as year'), DB::raw('count(*) as total'))
            ->whereBetween(DB::raw('YEAR(tanggal_pemeriksaan)'), [$currentYear - 5, $currentYear])
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();

        // Mengambil data pemeriksaan remaja per tahun
        $pemeriksaanRemajaPerTahun = PemeriksaanRemaja::select(DB::raw('YEAR(tanggal_pemeriksaan) as year'), DB::raw('count(*) as total'))
            ->whereBetween(DB::raw('YEAR(tanggal_pemeriksaan)'), [$currentYear - 5, $currentYear])
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();

        // Menggabungkan data untuk view
        $data = [
            'pemeriksaanAnak' => $pemeriksaanAnakPerTahun->map(function ($item) {
                return [
                    'year' => $item->year,
                    'total' => $item->total,
                ];
            }),
            'pemeriksaanIbu' => $pemeriksaanIbuPerTahun->map(function ($item) {
                return [
                    'year' => $item->year,
                    'total' => $item->total,
                ];
            }),
            'pemeriksaanLansia' => $pemeriksaanLansiaPerTahun->map(function ($item) {
                return [
                    'year' => $item->year,
                    'total' => $item->total,
                ];
            }),
            'pemeriksaanRemaja' => $pemeriksaanRemajaPerTahun->map(function ($item) {
                return [
                    'year' => $item->year,
                    'total' => $item->total,
                ];
            }),
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
        ]);
    }
}
