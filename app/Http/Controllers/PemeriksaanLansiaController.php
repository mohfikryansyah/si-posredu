<?php

namespace App\Http\Controllers;

use App\Models\PemeriksaanLansia;
use Illuminate\Http\Request;

class PemeriksaanLansiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemeriksaanLansia = PemeriksaanLansia::with('lansia')->latest()->get();
        return view('PemeriksaanLansia.index', [
            'pemeriksaans' => $pemeriksaanLansia,
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PemeriksaanLansia $pemeriksaanLansia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemeriksaanLansia $pemeriksaanLansia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PemeriksaanLansia $pemeriksaanLansia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemeriksaanLansia $pemeriksaanLansia)
    {
        //
    }
}
