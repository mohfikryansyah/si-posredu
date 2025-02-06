<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niks = Master::latest()->get();
        return view('Master.index', compact('niks'));
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
        $validatedData = $request->validateWithBag('add_nik', [
            'nik' => 'required|numeric|digits:16|unique:masters,nik',
        ]);

        Master::create($validatedData);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Master $master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Master $master)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validateWithBag('edit_nik', [
            'nik' => 'required|numeric|digits:16|unique:masters,nik,',
        ]);

        Master::where('id', $request->id)->update($validatedData);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Master::where('id', $request->id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
