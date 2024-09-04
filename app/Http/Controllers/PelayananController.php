<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Pelayanan.index', [
            'pelayanans' => Pelayanan::latest()->get(),
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
        $validatedData = $request->validateWithBag('add_pelayanan', [
            'nama' => 'required|max:50',
            'deskripsi' => 'required|max:255',
            'tanggal_pelayanan' => 'required|date',
            'start' => 'required',
            'end' => 'required',
        ]);

        Pelayanan::create($validatedData);
        return redirect()->route('jadwal-pelayanan.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelayanan $pelayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelayanan $jadwal_pelayanan)
    {
        return view('Pelayanan.edit', [
            'pelayanans' => Pelayanan::latest()->get(),
            'p' => $jadwal_pelayanan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelayanan $jadwal_pelayanan)
    {
        $validatedData = $request->validateWithBag('edit_pelayanan', [
            'nama' => 'required|max:50',
            'deskripsi' => 'required|max:255',
            'tanggal_pelayanan' => 'required|date',
            'start' => 'required',
            'end' => 'required',
        ]);

        Pelayanan::where('id', $jadwal_pelayanan->id)->update($validatedData);
        return redirect()->route('jadwal-pelayanan.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Pelayanan::findOrFail($request->id)->delete();
        return redirect()->route('jadwal-pelayanan.index')->with('success', 'Data berhasil dihapus!');
    }
}
