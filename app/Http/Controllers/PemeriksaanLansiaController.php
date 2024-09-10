<?php

namespace App\Http\Controllers;

use App\Exports\PemeriksaanLansiaExport;
use App\Models\Lansia;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\PemeriksaanLansia;
use Maatwebsite\Excel\Facades\Excel;

class PemeriksaanLansiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $golonganDarah = ['A', 'B', 'AB', 'O'];
        $pemeriksaanLansia = PemeriksaanLansia::with('lansia')->latest()->get();
        $lansias = Lansia::latest()->get();
        $employees = Employee::latest()->get();
        return view('PemeriksaanLansia.index', [
            'pemeriksaans' => $pemeriksaanLansia,
            'lansias' => $lansias,
            'employees' => $employees,
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
        // dd($request->all());
        $validatedData = $request->validateWithBag('add_pemeriksaan_lansia', [
            'lansia_id' => 'required',
            'employee_id' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'tekanan_darah' => 'required|max:255',
            'kolestrol' => 'required|numeric',
            'asam_urat' => 'required|numeric',
            'gula_darah' => 'required|numeric',
            // 'suhu_tubuh' => 'required|numeric',
            'catatan' => 'required|max:72',
        ]);

        PemeriksaanLansia::create($validatedData);

        return redirect()->route('pemeriksaanLansia')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($pemeriksaanLansia)
    {
        $lansias = PemeriksaanLansia::with(['lansia', 'employee'])->where('id', $pemeriksaanLansia)->firstOrFail();
        // dd($lansias->lansia_id);
        $pemeriksaanSebelumnya = PemeriksaanLansia::with(['lansia', 'employee'])->where('lansia_id', $lansias->lansia_id)->orderBy('tanggal_pemeriksaan', 'desc')->skip(1)->first();
        $count = PemeriksaanLansia::with(['lansia', 'employee'])->where('lansia_id', $lansias->lansia_id)->count();
        // dd($pemeriksaanSebelumnya);
        // dd($count);
        return view('PemeriksaanLansia.show', [
            'lansias' => $lansias,
            'pemeriksaanSebelumnya' => $pemeriksaanSebelumnya,
            'count' => $count,
        ]);
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
    public function update(Request $request)
    {
        $validatedData = $request->validateWithBag('edit_pemeriksaan_lansia', [
            'lansia_id' => 'required',
            'employee_id' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'tekanan_darah' => 'required|max:255',
            'kolestrol' => 'required|numeric',
            'asam_urat' => 'required|numeric',
            'gula_darah' => 'required|numeric',
            // 'suhu_tubuh' => 'required|numeric',
            'catatan' => 'required|max:72',
        ]);

        PemeriksaanLansia::where('id', $request->id)->update($validatedData);

        return redirect()->route('pemeriksaanLansia')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        PemeriksaanLansia::findOrFail($request->id)->delete();
        return back()->with('success',"Data berhasil dihapus!");
    }

    public function export(Request $request)
    {
        $id = $request->input('lansia_id');
        $startDate = $request->input('start');
        $endDate = $request->input('end');

        return Excel::download(new PemeriksaanLansiaExport($id, $startDate, $endDate), 'laporan_pemeriksaan_lansia.xlsx');
    }
}
