<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ibu;
use App\Models\Master;
use App\Models\Remaja;
use App\Models\Pelayanan;
use App\Exports\IbuExport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class IbuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $golonganDarah = ['A', 'B', 'AB', 'O'];
        return view('Ibu.index', [
            'moms' => Ibu::latest()->get(),
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
        $validatedData = $request->validateWithBag('add_ibu', [
            'nama' => 'required|string|max:255',
            'nama_suami' => 'required|string|max:255',
            'nik' => 'required|digits:16|unique:ibus,nik',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'golongan_darah' => 'required|string|max:3',
            'nomor_kehamilan' => 'required|numeric|max_digits:2',
            'tanggal_pendaftaran' => 'required',
            'no_tlp' => 'required|numeric|min_digits:10|max_digits:13',
        ]);

        
        $cekNIK = Master::where('nik', $validatedData['nik'])->exists();
        if(!$cekNIK) {
            return redirect()->route('remaja')->with('error', 'NIK tidak ditemukan!');
        }


        Ibu::create($validatedData);

        return redirect()->route('ibu')->with('success', 'Data berhasil disimpan!');
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
    public function update(Request $request)
    {   
        // dd($request->all());
        $validatedData = $request->validateWithBag('edit_ibu', [
            'nama' => 'required|string|max:255',
            'nama_suami' => 'required|string|max:255',
            'nik' => [
                'required',
                'digits:16',
                Rule::unique('ibus')->ignore($request->id),
            ],
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'golongan_darah' => 'required|string|max:3',
            'nomor_kehamilan' => 'required|numeric|max_digits:2',
            'tanggal_pendaftaran' => 'required',
            'no_tlp' => 'required|numeric|min_digits:10|max_digits:13',
        ]);

        Ibu::where('id', $request->id)->update($validatedData);        

        return redirect()->route('ibu')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Ibu::findOrFail($request->id)->delete();
        return back()->with('success',"Data berhasil dihapus!");
    }

    public function export(Request $request)
    {
        $id = $request->input('ibu_id');
        $startDate = $request->input('start');
        $endDate = $request->input('end');

        return Excel::download(new IbuExport($id, $startDate, $endDate), 'laporan_ibu.xlsx');
    }
}
