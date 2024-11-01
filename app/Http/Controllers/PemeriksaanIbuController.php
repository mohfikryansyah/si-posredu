<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ibu;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\PemeriksaanIbu;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PemeriksaanIbuExport;
use App\Models\MissedPelayanans;

class PemeriksaanIbuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $suntik_tetanus_toksoid = ['Ya', 'Tidak'];
        $golonganDarah = ['A', 'B', 'AB', 'O'];
        $moms = Ibu::with('pemeriksaanIbu')->latest()->get();
        $pemeriksaanIbu = $pemeriksaanIbu = PemeriksaanIbu::select('*')
            ->whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('pemeriksaan_ibus')
                    ->groupBy('ibu_id');
            })
            ->latest()
            ->get();
        // dd($pemeriksaanIbu);
        $employees = Employee::all();
        return view('PemeriksaanIbu.index', [
            'moms' => $moms,
            'pemeriksaanIbu' => $pemeriksaanIbu,
            'employees' => $employees,
            'golongan_darah' => $golonganDarah,
            'suntik_tetanus_toksoid' => $suntik_tetanus_toksoid,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validateWithBag('add_pemeriksaan_ibu', [
            'ibu_id' => 'required',
            'employee_id' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'usia_kehamilan' => 'required|max:255',
            'tekanan_darah' => 'required|max:255',
            'tinggi_badan' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            'tinggi_fundus' => 'required|numeric',
            'denyut_jantung_janin' => 'required|numeric',
            'lingkar_lengan_atas' => 'required|numeric',
            'pemeriksaan_lab' => 'required|max:255',
            'suntik_tetanus_toksoid' => 'required|max:255',
            'keluhan' => 'required|max:100',
            'pemberian_vitamin' => 'required|max:100',
            'catatan' => 'required|max:72',
        ]);

        $nomorPemeriksaan = PemeriksaanIbu::with(['ibu', 'employee'])->where('ibu_id', $request->ibu_id)->orderBy('tanggal_pemeriksaan', 'desc')->first();

        if ($nomorPemeriksaan) {
            $validatedData['pemeriksaan_ke'] = $nomorPemeriksaan['pemeriksaan_ke'] + 1;
        } else {
            $validatedData['pemeriksaan_ke'] = 1;
        }

        // dd($validatedData['pemeriksaan_ke']);

        PemeriksaanIbu::create($validatedData);

        return redirect()->route('pemeriksaanIbu')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($pemeriksaanIbu)
    {
        $showPemeriksaan = PemeriksaanIbu::with(['ibu', 'employee'])->where('id', $pemeriksaanIbu)->firstOrFail();
        $pemeriksaanSebelumnya = PemeriksaanIbu::with(['ibu', 'employee'])
            ->where('ibu_id', $showPemeriksaan->ibu_id)
            ->where('tanggal_pemeriksaan', '<', $showPemeriksaan->tanggal_pemeriksaan)
            ->orderBy('tanggal_pemeriksaan', 'desc')
            ->first();
        $allPemeriksaanIbuSaatIni = PemeriksaanIbu::with(['ibu', 'employee'])
            ->where('ibu_id', $showPemeriksaan->ibu_id)
            ->orderBy('tanggal_pemeriksaan', 'desc')
            ->get();
        $suntik_tetanus_toksoid = ['Ya', 'Tidak'];
        // dd($suntik_tetanus_toksoid);

        return view('PemeriksaanIbu.show', [
            'mom' => $showPemeriksaan,
            'pemeriksaanSebelumnya' => $pemeriksaanSebelumnya,
            'allPemeriksaanIbuSaatIni' => $allPemeriksaanIbuSaatIni,
            'moms' => Ibu::with('pemeriksaanIbu')->latest()->get(),
            'employees' => Employee::latest()->get(),
            'suntik_tetanus_toksoid' => $suntik_tetanus_toksoid,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemeriksaanIbu $pemeriksaanIbu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validateWithBag('edit_pemeriksaan_ibu', [
            'ibu_id' => 'required',
            'employee_id' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'usia_kehamilan' => 'required|max:255',
            'tekanan_darah' => 'required|max:255',
            'tinggi_badan' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            'tinggi_fundus' => 'required|numeric',
            'denyut_jantung_janin' => 'required|numeric',
            'lingkar_lengan_atas' => 'required|numeric',
            'pemeriksaan_lab' => 'required|max:255',
            'suntik_tetanus_toksoid' => 'required|max:255',
            'keluhan' => 'required|max:100',
            'pemberian_vitamin' => 'required|max:100',
            'catatan' => 'required|max:72',
        ]);

        PemeriksaanIbu::where('id', $request->id)->update($validatedData);
        return redirect()->route('pemeriksaanIbu')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        PemeriksaanIbu::findOrFail($request->id)->delete();
        return back()->with('success', "Data berhasil dihapus!");
    }

    public function export(Request $request)
    {
        $id = $request->input('ibu_id');
        $startDate = $request->input('start');
        $endDate = $request->input('end');

        return Excel::download(new PemeriksaanIbuExport($id, $startDate, $endDate), 'laporan_pemeriksaan_ibu.xlsx');
    }

    public function tanpaPemeriksaanIbu()
    {
        $tanpaPemeriksaanIbu = MissedPelayanans::where('entitas_type', 'Ibu')->latest()->get();
        return view('TanpaPemeriksaan.ibu', compact('tanpaPemeriksaanIbu'));
    }
}
