<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\PemeriksaanAnak;

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
        return view('PemeriksaanAnak.index', [
            'pemeriksaans' => $pemeriksaans,
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
        $children = PemeriksaanAnak::with(['anak', 'employee'])->where('id', $pemeriksaanAnak)->firstOrFail();
        // dd($children->anak_id);
        $pemeriksaanSebelumnya = PemeriksaanAnak::with(['anak', 'employee'])->where('anak_id', $children->anak_id)->orderBy('tanggal_pemeriksaan', 'desc')->skip(1)->first();
        $count = PemeriksaanAnak::with(['anak', 'employee'])->where('anak_id', $children->anak_id)->count();
        // dd($pemeriksaanSebelumnya);
        // dd($count);
        return view('PemeriksaanAnak.show', [
            'children' => $children,
            'pemeriksaanSebelumnya' => $pemeriksaanSebelumnya,
            'count' => $count,
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
}
