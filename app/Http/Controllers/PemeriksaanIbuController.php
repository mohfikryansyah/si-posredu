<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;
use App\Models\Ibu;
use Illuminate\Http\Request;
use App\Models\PemeriksaanIbu;

class PemeriksaanIbuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $golonganDarah = ['A', 'B', 'AB', 'O'];
        $moms = Ibu::with('pemeriksaanIbu')->latest()->get();
        $moms_cek = PemeriksaanIbu::with('ibu')->latest()->get();
        $employees = Employee::all();
        return view('PemeriksaanIbu.index', [
            'moms' => $moms,
            'momsCek' => $moms_cek,
            'employees' => $employees,
            'golongan_darah' => $golonganDarah
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
            'berat_badan' => 'required|numeric',
            'tinggi_fundus' => 'required|numeric',
            'denyut_jantung_janin' => 'required|numeric',
            'keluhan' => 'required|max:100',
            'pemberian_vitamin' => 'required|max:100',
            'catatan' => 'required|max:72',
        ]);

        PemeriksaanIbu::create($validatedData);

        return redirect()->route('pemeriksaanIbu')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($pemeriksaanIbu)
    {
        $showPemeriksaan = PemeriksaanIbu::with('ibu')->where('id', $pemeriksaanIbu)->firstOrFail();
        return view('PemeriksaanIbu.show', [
            'mom' => $showPemeriksaan,
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
            'berat_badan' => 'required|numeric',
            'tinggi_fundus' => 'required|numeric',
            'denyut_jantung_janin' => 'required|numeric',
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
        return back()->with('success',"Data berhasil dihapus!");
    }
}
