<?php

namespace App\Http\Controllers;

use App\Models\Ibu;
use Illuminate\Http\Request;

class IbuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $golonganDarah = ['A', 'B', 'AB', 'O'];
        return view('Ibu.index', [
            'moms' => Ibu::paginate(10),
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
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'golongan_darah' => 'required|string|max:3',
            'no_tlp' => 'required|numeric|min_digits:10|max_digits:13',
        ]);


        Ibu::create($validatedData);

        return redirect()->route('ibu.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ibu $ibu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ibu $ibu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ibu $ibu)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ibu $ibu)
    {
        //
    }
}
