<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genders = ['Laki-laki', 'Perempuan'];
        return view('Anak.index', [
            'children' => Anak::latest()->get(),
            'genders' => $genders
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
        $validatedData = $request->validateWithBag('add_anak', [
            'nama' => 'required|max:255',
            'nama_ibu' => 'required|max:255',
            'nama_ayah' => 'required|max:255',
            'nik' => 'required|digits:16|unique:anaks,nik',
            'tempat_tanggal_lahir' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_tlp' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'tanggal_pendaftaran' => 'required|max:255',
        ]);

        Anak::create($validatedData);
        return redirect()->route('anak')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anak $anak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anak $anak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validateWithBag('edit_anak', [
            'nama' => 'required|max:255',
            'nama_ibu' => 'required|max:255',
            'nik' => [
                'required',
                'digits:16',
                Rule::unique('anaks')->ignore($request->id),
            ],
            'nama_ayah' => 'required|max:255',
            'tempat_tanggal_lahir' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_tlp' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'tanggal_pendaftaran' => 'required|max:255',
        ]);

        Anak::where('id', $request->id)->update($validatedData);
        return redirect()->route('anak')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Anak::findOrFail($request->id)->delete();
        return back()->with('success',"Data berhasil dihapus!");
    }
}
