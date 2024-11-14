<?php

namespace App\Http\Controllers;

use App\Models\Lansia;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\MissedPelayanans;
use App\Models\PemeriksaanLansia;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PemeriksaanLansiaExport;

class PemeriksaanLansiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $golonganDarah = ['A', 'B', 'AB', 'O'];
        $pemeriksaanLansia = PemeriksaanLansia::with('lansia')->latest()->get();
        $lansias = Lansia::latest()->get();
        $employees = Employee::latest()->get();
        $pemeriksaanLansias = PemeriksaanLansia::select('*')
            ->whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('pemeriksaan_lansias')
                    ->groupBy('lansia_id');
            })
            ->latest()
            ->get();
        return view('PemeriksaanLansia.index', [
            'pemeriksaans' => $pemeriksaanLansia,
            'pemeriksaanLansias' => $pemeriksaanLansias,
            'lansias' => $lansias,
            'employees' => $employees,
            'golongan_darah' => $golonganDarah,
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
        $validatedData = $request->validateWithBag('add_pemeriksaan_lansia', [
            'lansia_id' => 'required',
            'employee_id' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'tekanan_darah' => 'required|max:255',
            'kolestrol' => 'required|numeric',
            'asam_urat' => 'required|numeric',
            'gula_darah' => 'required|numeric',
            // 'suhu_tubuh' => 'required|numeric',
            'catatan' => 'required|max:72',
        ]);

        PemeriksaanLansia::create($validatedData);

        return redirect()->route('pemeriksaanLansia')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($pemeriksaanLansia)
    {
        $lansia = PemeriksaanLansia::with(['lansia', 'employee'])->where('id', $pemeriksaanLansia)->firstOrFail();
        $count = PemeriksaanLansia::with(['lansia', 'employee'])->where('lansia_id', $lansia->lansia_id)->count();

        $pemeriksaanSebelumnya = PemeriksaanLansia::with(['lansia', 'employee'])
            ->where('lansia_id', $lansia->lansia_id)
            ->where('tanggal_pemeriksaan', '<', $lansia->tanggal_pemeriksaan)
            ->orderBy('tanggal_pemeriksaan', 'desc')
            ->first();
        $allPemeriksaanLansiaSaatIni = PemeriksaanLansia::with(['lansia', 'employee'])
            ->where('lansia_id', $lansia->lansia_id)
            ->orderBy('tanggal_pemeriksaan', 'desc')
            ->get();

        return view('PemeriksaanLansia.show', [
            'lansia' => $lansia,
            'lansias' => PemeriksaanLansia::with(['lansia', 'employee'])->latest()->get(),
            'pemeriksaanSebelumnya' => $pemeriksaanSebelumnya,
            'allPemeriksaanLansiaSaatIni' => $allPemeriksaanLansiaSaatIni,
            'count' => $count,
            'employees' => Employee::latest()->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemeriksaanLansia $pemeriksaanLansia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validateWithBag('edit_pemeriksaan_lansia', [
            'lansia_id' => 'required',
            'employee_id' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'tekanan_darah' => 'required|max:255',
            'kolestrol' => 'required|numeric',
            'asam_urat' => 'required|numeric',
            'gula_darah' => 'required|numeric',
            // 'suhu_tubuh' => 'required|numeric',
            'catatan' => 'required|max:72',
        ]);

        PemeriksaanLansia::where('id', $request->id)->update($validatedData);

        return redirect()->route('pemeriksaanLansia')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        PemeriksaanLansia::findOrFail($request->id)->delete();
        return back()->with('success', "Data berhasil dihapus!");
    }

    public function export(Request $request)
    {
        $id = $request->input('lansia_id');
        $startDate = $request->input('start');
        $endDate = $request->input('end');

        return Excel::download(new PemeriksaanLansiaExport($id, $startDate, $endDate), 'laporan_pemeriksaan_lansia.xlsx');
    }

    public function tanpaPemeriksaanLansia()
    {
        $tanpaPemeriksaanLansia = MissedPelayanans::where('entitas_type', 'Lansia')->latest()->get();
        return view('TanpaPemeriksaan.lansia', compact('tanpaPemeriksaanLansia'));
    }
}
