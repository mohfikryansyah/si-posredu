<?php

namespace App\Http\Controllers;

use App\Models\IbuHamil;
use Illuminate\Http\Request;

class IbuHamilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('IbuHamil.index', [
            'moms' => IbuHamil::latest()->get(),
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
        $validatedData = $request->validateWithBag('add_ibuHamil', [
            'nama' => 'required|string|max:255',
            'penolong_persalinan' => 'required|string|max:255',
            'nomor_kehamilan' => 'required|numeric',
            'usia_kehamilan' => 'required',
            'tanggal_persalinan' => 'required',
            'kondisi_bayi' => 'required|max:100',
        ]);
        
        IbuHamil::create($validatedData);
        return redirect()->route('ibu-hamil')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(IbuHamil $ibuHamil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IbuHamil $ibuHamil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validateWithBag('edit_ibuHamil', [
            'nama' => 'required|string|max:255',
            'penolong_persalinan' => 'required|string|max:255',
            'nomor_kehamilan' => 'required|numeric',
            'usia_kehamilan' => 'required',
            'tanggal_persalinan' => 'required',
            'kondisi_bayi' => 'required|max:100',
        ]);
        
        IbuHamil::where('id', $request->id)->update($validatedData);
        return redirect()->route('ibu-hamil')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        IbuHamil::findOrFail($request->id)->delete();
        return back()->with('success',"Data berhasil dihapus!");
    }
}
