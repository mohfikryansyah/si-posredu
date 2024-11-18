<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class PetugasKesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugasKesehatan = Employee::with('user')->where('jabatan', '!=', 'Kader')->latest()->get();
        return view('EmployeePetugas.index', compact('petugasKesehatan'));
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
        $validatedData = $request->validateWithBag('add_petugasKesehatan', [
            'nama' => 'required|string|max:150',
            'nip' => 'required|digits:18',
            'jabatan' => 'required|in:Dokter,Perawat,Bidan',
            'unit_kerja' => 'required|string|max:255',
            'no_tlp' => 'required|numeric|digits_between:10,15',
            'alamat' => 'required|string|max:255',
        ]);

        Employee::create($validatedData);

        return redirect()->route('petugas-kesehatan.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $petugas_kesehatan)
    {
        $petugasKesehatan = Employee::with('user')->where('jabatan', '!=', 'Kader')->latest()->get();
        return view('EmployeePetugas.edit', [
            'petugasKesehatan' => $petugasKesehatan,
            'e' => $petugas_kesehatan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $petugas_kesehatan)
    {
        $validatedData = $request->validateWithBag('add_petugasKesehatan', [
            'nama' => 'required|string|max:150',
            'nip' => 'required|digits:18',
            'jabatan' => 'required|in:Dokter,Perawat,Bidan',
            'unit_kerja' => 'required|string|max:255',
            'no_tlp' => 'required|numeric|digits_between:10,15',
            'alamat' => 'required|string|max:255',
        ]);

        Employee::where('id', $petugas_kesehatan->id)->update($validatedData);

        return redirect()->route('petugas-kesehatan.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Employee::findOrFail($request->id)->delete();
        return redirect()->route('petugas-kesehatan.index')->with('success', 'Data berhasil dihapus!');
    }
}
