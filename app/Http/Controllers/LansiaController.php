<?php

namespace App\Http\Controllers;

use App\Models\Lansia;
use App\Models\Master;
use Illuminate\Http\Request;
use App\Exports\LansiaExport;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

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
            'nik' => 'required|digits:16|unique:lansias,nik',
            'golongan_darah' => 'required|string|max:3',
            'alamat' => 'required|string|max:255',
            'no_tlp' => 'required|numeric|min_digits:10|max_digits:13',
            'tanggal_pendaftaran' => 'required',
            'pekerjaan' => 'required|string|max:255',
        ]);

        $cekNIK = Master::where('nik', $validatedData['nik'])->exists();
        if(!$cekNIK) {
            return redirect()->route('remaja')->with('error', 'NIK tidak ditemukan!');
        }

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
            'nik' => [
                'required',
                'digits:16',
                Rule::unique('lansias')->ignore($request->id),
            ],
            'golongan_darah' => 'required|string|max:3',
            'alamat' => 'required|string|max:255',
            'no_tlp' => 'required|numeric|min_digits:10|max_digits:13',
            'tanggal_pendaftaran' => 'required',
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

    public function export(Request $request)
    {
        $id = $request->input('remaja_id');
        $startDate = $request->input('start');
        $endDate = $request->input('end');

        return Excel::download(new LansiaExport($id, $startDate, $endDate), 'laporan_lansia.xlsx');
    }
}
