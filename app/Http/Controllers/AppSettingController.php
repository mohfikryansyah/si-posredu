<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use Illuminate\Http\Request;

class AppSettingController extends Controller
{
    public function index()
    {
        return view('AppSetting.index', [
            'app' => AppSetting::first(),
        ]);
    }

    public function update(Request $request, AppSetting $id)
    {
        $validatedData = $request->validateWithBag('edit_app', [
            'app_name' => 'required|string|max:15',
            'visi' => 'required|string',
            'misi1' => 'required|string',
            'misi2' => 'required|string',
            'misi3' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_tlp' => 'required|numeric|digits_between:10,15',
        ]);

        $id->update($validatedData);
        return redirect()->route('app-setting.index')->with('success', 'Data berhasil diubah!');
    }
}
