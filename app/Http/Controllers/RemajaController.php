<?php

namespace App\Http\Controllers;

use App\Exports\RemajaExport;
use App\Models\Remaja;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class RemajaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genders = ['Laki-laki', 'Perempuan'];
        $golonganDarah = ['A', 'B', 'AB', 'O'];
        $remaja = Remaja::latest()->get();
        return view('Remaja.index', [
            'remajas' => $remaja,
            'golongan_darah' => $golonganDarah,
            'genders' => $genders,
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
        $validatedData = $request->validateWithBag('add_remaja', [
            'nama' => 'required|max:255',
            'nik' => 'required|digits:16|unique:remajas,nik',
            'usia' => 'required|max_digits:3',
            'nama_orang_tua' => 'required|max:255',
            'pekerjaan_orang_tua' => 'required|max:255',
            'golongan_darah' => 'required|max:255',
            'tempat_tanggal_lahir' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_tlp' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'tanggal_pendaftaran' => 'required|max:255',
        ]);

        Remaja::create($validatedData);
        return redirect()->route('remaja')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Remaja $remaja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Remaja $remaja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validateWithBag('edit_remaja', [
            'nama' => 'required|max:255',
            'nik' => [
                'required',
                'digits:16',
                Rule::unique('remajas')->ignore($request->id),
            ],
            'usia' => 'required|max_digits:3',
            'nama_orang_tua' => 'required|max:255',
            'pekerjaan_orang_tua' => 'required|max:255',
            'golongan_darah' => 'required|max:255',
            'tempat_tanggal_lahir' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_tlp' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'tanggal_pendaftaran' => 'required|max:255',
        ]);

        Remaja::where('id', $request->id)->update($validatedData);
        return redirect()->route('remaja')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Remaja::findOrFail($request->id)->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function export(Request $request)
    {
        $id = $request->input('remaja_id');
        $startDate = $request->input('start');
        $endDate = $request->input('end');

        return Excel::download(new RemajaExport($id, $startDate, $endDate), 'laporan_remaja.xlsx');
    }
}
