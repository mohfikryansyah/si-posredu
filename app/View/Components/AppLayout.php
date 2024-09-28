<?php

namespace App\View\Components;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pelayanan;
use Illuminate\View\View;
use App\Models\PemeriksaanIbu;
use Illuminate\View\Component;
use App\Models\PemeriksaanAnak;
use App\Models\PemeriksaanLansia;
use App\Models\PemeriksaanRemaja;
use Illuminate\Support\Facades\Auth;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $user = User::find(Auth::user()->id);
        
        if ($user->hasRole('ADMIN')) {
            return view('layouts.app');
        }

        return view('layouts.app', [
            'jadwal' => $this->getJadwalPelayanan(),
            'ibuBelumPemeriksaan' => $this->getIbuBelumPemeriksaan(),
        ]);
    }

    private function getJadwalPelayanan()
    {
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;
        $result = Pelayanan::whereMonth('tanggal_pelayanan', $bulanIni)->whereYear('tanggal_pelayanan', $tahunIni)->latest()->first();
        return $result;
    }

    private function getIbuBelumPemeriksaan()
    {
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;
        $user = Auth::user();
        $result = null;

        $jadwalPelayanan = $this->getJadwalPelayanan();
        if (!$jadwalPelayanan) {
            return null;
        }

        switch ($user->tipe_entitas) {
            case 'anak':
                if ($user->anak_id) {
                    $result = PemeriksaanAnak::where('anak_id', $user->anak_id)
                        ->where('tanggal_pemeriksaan', '>=', $this->getJadwalPelayanan()->tanggal_pelayanan)
                        // ->take(4)
                        ->whereMonth('tanggal_pemeriksaan', $bulanIni)
                        ->whereYear('tanggal_pemeriksaan', $tahunIni)
                        ->first();
                }
                break;

            case 'remaja':
                if ($user->remaja_id) {
                    $result = PemeriksaanRemaja::where('id', $user->anak_id)
                        ->where('tanggal_pemeriksaan', '>=', $this->getJadwalPelayanan()->tanggal_pelayanan)
                        // ->take(4)
                        ->whereMonth('tanggal_pemeriksaan', $bulanIni)
                        ->whereYear('tanggal_pemeriksaan', $tahunIni)
                        ->first();
                }
                break;

            case 'ibu':
                if ($user->ibu_id) {
                    $result = PemeriksaanIbu::where('id', $user->anak_id)
                        ->where('tanggal_pemeriksaan', '>=', $this->getJadwalPelayanan()->tanggal_pelayanan)
                        // ->take(4)
                        ->whereMonth('tanggal_pemeriksaan', $bulanIni)
                        ->whereYear('tanggal_pemeriksaan', $tahunIni)
                        ->first();
                }
                break;

            case 'lansia':
                if ($user->lansia_id) {
                    $result = PemeriksaanLansia::where('id', $user->anak_id)
                        ->where('tanggal_pemeriksaan', '>=', $this->getJadwalPelayanan()->tanggal_pelayanan)
                        // ->take(4)
                        ->whereMonth('tanggal_pemeriksaan', $bulanIni)
                        ->whereYear('tanggal_pemeriksaan', $tahunIni)
                        ->first();
                }
                break;

            default:
                break;
        }
        
        return $result;
    }
}
