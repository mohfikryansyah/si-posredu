<?php

namespace App\Http\Controllers;

use App\Models\Remaja;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\MissedPelayanans;
use App\Models\PemeriksaanRemaja;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PemeriksaanRemajaExport;

class PemeriksaanRemajaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemeriksaanRemaja = PemeriksaanRemaja::with(['remaja', 'employee'])->latest()->get();
        $remaja = Remaja::latest()->get();
        $employees = Employee::latest()->get();
        $pemeriksaanRemajas = PemeriksaanRemaja::select('*')
            ->whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('pemeriksaan_remajas')
                    ->groupBy('remaja_id');
            })
            ->latest()
            ->get();
        return view('PemeriksaanRemaja.index', [
            'pemeriksaans' => $pemeriksaanRemaja,
            'pemeriksaanRemajas' => $pemeriksaanRemajas,
            'remajas' => $remaja,
            'employees' => $employees,
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
        $validatedData = $request->validateWithBag('add_pemeriksaan_remaja', [
            'remaja_id' => 'required',
            'employee_id' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'tekanan_darah' => 'required|max:255',
            'konseling_kesehatan' => 'required|max:255',
            'pemberian_vitamin' => 'required|in:Ya,Tidak',
            'catatan' => 'required|max:72',
        ]);

        PemeriksaanRemaja::create($validatedData);

        return redirect()->route('pemeriksaanRemaja')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($pemeriksaanRemaja)
    {
        $remaja = PemeriksaanRemaja::with(['remaja', 'employee'])->where('id', $pemeriksaanRemaja)->firstOrFail();
        $count = PemeriksaanRemaja::with(['remaja', 'employee'])->where('remaja_id', $remaja->remaja_id)->count();

        $pemeriksaanSebelumnya = PemeriksaanRemaja::with(['remaja', 'employee'])
            ->where('remaja_id', $remaja->remaja_id)
            ->where('tanggal_pemeriksaan', '<', $remaja->tanggal_pemeriksaan)
            ->orderBy('tanggal_pemeriksaan', 'desc')
            ->first();
        $allPemeriksaanRemajaSaatIni = PemeriksaanRemaja::with(['remaja', 'employee'])
            ->where('remaja_id', $remaja->remaja_id)
            ->orderBy('tanggal_pemeriksaan', 'desc')
            ->get();

        return view('PemeriksaanRemaja.show', [
            'remaja' => $remaja,
            'remajas' => Remaja::with('pemeriksaanRemaja')->latest()->get(),
            'pemeriksaanSebelumnya' => $pemeriksaanSebelumnya,
            'allPemeriksaanRemajaSaatIni' => $allPemeriksaanRemajaSaatIni,
            'count' => $count,
            'employees' => Employee::latest()->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemeriksaanRemaja $pemeriksaanRemaja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validateWithBag('edit_pemeriksaan_remaja', [
            'remaja_id' => 'required',
            'employee_id' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'tekanan_darah' => 'required|max:255',
            'konseling_kesehatan' => 'required|max:255',
            'pemberian_vitamin' => 'required|in:Ya,Tidak',
            'catatan' => 'required|max:72',
        ]);

        PemeriksaanRemaja::where('id', $request->id)->update($validatedData);

        return redirect()->route('pemeriksaanRemaja')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        PemeriksaanRemaja::findOrFail($request->id)->delete();
        return back()->with('success', "Data berhasil dihapus!");
    }

    public function export(Request $request)
    {
        $id = $request->input('remaja_id');
        $startDate = $request->input('start');
        $endDate = $request->input('end');

        return Excel::download(new PemeriksaanRemajaExport($id, $startDate, $endDate), 'Laporan Pemeriksaan Remaja.xlsx');
    }

    public function tanpaPemeriksaanRemaja()
    {
        $tanpaPemeriksaanRemaja = MissedPelayanans::where('entitas_type', 'Remaja')->latest()->get();
        return view('TanpaPemeriksaan.remaja', compact('tanpaPemeriksaanRemaja'));
    }
}
