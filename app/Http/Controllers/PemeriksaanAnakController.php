<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\PemeriksaanAnak;
use App\Models\MissedPelayanans;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PemeriksaanAnakExport;
use App\Exports\PemeriksaanLansiaExport;

class PemeriksaanAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $children = Anak::latest()->get();
        $employees = Employee::latest()->get();
        $pemeriksaans = PemeriksaanAnak::with('anak')->latest()->get();
        $pemeriksaanAnak = PemeriksaanAnak::select('*')
            ->whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('pemeriksaan_anaks')
                    ->groupBy('anak_id');
            })
            ->latest()
            ->get();

        return view('PemeriksaanAnak.index', [
            'pemeriksaans' => $pemeriksaans,
            'pemeriksaanAnaks' => $pemeriksaanAnak,
            'children' => $children,
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
        $validatedData = $request->validateWithBag('add_pemeriksaan_anak', [
            'anak_id' => 'required',
            'employee_id' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'tekanan_darah' => 'required|max:255',
            'suhu_tubuh' => 'required|numeric',
            'status_imunisasi' => 'required|max:100',
            'riwayat_penyakit' => 'required|max:100',
            'catatan' => 'required|max:72',
        ]);

        PemeriksaanAnak::create($validatedData);

        return redirect()->route('pemeriksaanAnak')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($pemeriksaanAnak)
    {
        $child = PemeriksaanAnak::with(['anak', 'employee'])->where('id', $pemeriksaanAnak)->firstOrFail();
        $count = PemeriksaanAnak::with(['anak', 'employee'])->where('anak_id', $child->anak_id)->count();

        $pemeriksaanSebelumnya = PemeriksaanAnak::with(['anak', 'employee'])
            ->where('anak_id', $child->anak_id)
            ->where('tanggal_pemeriksaan', '<', $child->tanggal_pemeriksaan)
            ->orderBy('tanggal_pemeriksaan', 'desc')
            ->first();
        $allPemeriksaanAnakSaatIni = PemeriksaanAnak::with(['anak', 'employee'])
            ->where('anak_id', $child->anak_id)
            ->orderBy('tanggal_pemeriksaan', 'desc')
            ->get();

            // dd(Anak::with('pemeriksaanAnak')->latest()->get());


        return view('PemeriksaanAnak.show', [
            'child' => $child,
            'children' => Anak::with('pemeriksaanAnak')->latest()->get(),
            'pemeriksaanSebelumnya' => $pemeriksaanSebelumnya,
            'allPemeriksaanAnakSaatIni' => $allPemeriksaanAnakSaatIni,
            'count' => $count,
            'employees' => Employee::latest()->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemeriksaanAnak $pemeriksaanAnak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validateWithBag('edit_pemeriksaan_anak', [
            'anak_id' => 'required',
            'employee_id' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'tekanan_darah' => 'required|max:255',
            'suhu_tubuh' => 'required|numeric',
            'status_imunisasi' => 'required|max:100',
            'riwayat_penyakit' => 'required|max:100',
            'catatan' => 'required|max:72',
        ]);

        PemeriksaanAnak::where('id', $request->id)->update($validatedData);

        return redirect()->route('pemeriksaanAnak')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        PemeriksaanAnak::findOrFail($request->id)->delete();
        return redirect()->route('pemeriksaanAnak')->with('success', 'Data berhasil dihapus!');
    }

    public function export(Request $request)
    {
        $id = $request->input(' anak_id');
        $startDate = $request->input('start');
        $endDate = $request->input('end');

        return Excel::download(new PemeriksaanAnakExport($id, $startDate, $endDate), 'laporan_pemeriksaan_anak.xlsx');
    }

    public function tanpaPemeriksaanAnak()
    {
        $tanpaPemeriksaanAnak = MissedPelayanans::where('entitas_type', 'Anak')->latest()->get();
        return view('TanpaPemeriksaan.anak', compact('tanpaPemeriksaanAnak'));
    }
}
