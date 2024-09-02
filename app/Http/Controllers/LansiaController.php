<?php

namespace App\Http\Controllers;

use App\Models\Lansia;
use Illuminate\Http\Request;

class LansiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $golonganDarah = ['A', 'B', 'AB', 'O'];
        $lansias = Lansia::latest()->get();
        return view('Lansia.index', [
            'lansias' => $lansias,
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
        $validatedData = $request->validateWithBag('add_lansia', [
            'nama' => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'golongan_darah' => 'required|string|max:3',
            'alamat' => 'required|string|max:255',
            'no_tlp' => 'required|numeric|min_digits:10|max_digits:13',
            'pekerjaan' => 'required|string|max:255',
        ]);


        Lansia::create($validatedData);

        return redirect()->route('lansia')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lansia $lansia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lansia $lansia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validateWithBag('edit_lansia', [
            'nama' => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'golongan_darah' => 'required|string|max:3',
            'alamat' => 'required|string|max:255',
            'no_tlp' => 'required|numeric|min_digits:10|max_digits:13',
            'pekerjaan' => 'required|string|max:255',
        ]);


        Lansia::where('id', $request->id)->update($validatedData);

        return redirect()->route('lansia')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Lansia::findOrFail($request->id)->delete();
        return back()->with('success',"Data berhasil dihapus!");
    }
}