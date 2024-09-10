<?php

namespace App\Http\Controllers\Masyarakat;

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
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $ada = $this->getAllPemeriksaan();
        // dd($ada);
        return view('Masyarakat.dashboard', [
            'pemeriksaans' => $this->getAllPemeriksaan(),
        ]);
    }

    private function getTotalDataPemeriksaan()
    {
        return [
            'ibu' => PemeriksaanIbu::where('employee_id', Auth::user()->employee_id)->count(),
            'anak' => PemeriksaanAnak::where('employee_id', Auth::user()->employee_id)->count(),
            'remaja' => PemeriksaanRemaja::where('employee_id', Auth::user()->employee_id)->count(),
            'lansia' => PemeriksaanLansia::where('employee_id', Auth::user()->employee_id)->count(),
        ];
    }

    private function getAllPemeriksaan()
    {
        $user = Auth::user();
        $result = null;

        switch ($user->tipe_entitas) {
            case 'anak':
                if ($user->anak_id) {
                    $result = PemeriksaanAnak::where('anak_id', $user->anak_id)->get();
                }
                break;

            case 'remaja':
                if ($user->remaja_id) {
                    $result = PemeriksaanRemaja::where('remaja_id', $user->remaja_id)->get();
                }
                break;

            case 'ibu':
                if ($user->ibu_id) {
                    $result = PemeriksaanIbu::where('ibu_id', $user->ibu_id)->get();
                }
                break;

            case 'lansia':
                if ($user->lansia_id) {
                    $result = PemeriksaanLansia::where('lansia_id', $user->lansia_id)->get();
                }
                break;

            default:
                break;
        }

        return $result;
    }
}
