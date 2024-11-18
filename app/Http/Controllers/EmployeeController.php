<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('user')->where('jabatan', '=', 'Kader')->latest()->get();
        $users = User::with('employee')->get();

        return view('Employee.index', compact([
            'employees',
            'users'
        ]));
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
        $validatedData = $request->validateWithBag('add_employee', [
            'nama' => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'join' => 'required|date',
        ]);

        $validatedData['jabatan'] = 'Kader';

        // if ($request->hasFile('avatar')) {
        //     $imagePath = $request->file('avatar')->store('avatar', 'public');
        //     $validatedData['avatar'] = $imagePath;
        // }

        Employee::create($validatedData);

        return redirect()->route('employee.index')->with('success', 'Data berhasil disimpan!');
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
    public function edit(Employee $employee)
    {
        return view('Employee.edit', [
            'employees' => Employee::with('user')->latest()->get(),
            'e' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validateWithBag('edit_employee', [
            'nama' => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'join' => 'required|date'
        ]);

        Employee::where('id', $employee->id)->update($validatedData);

        return redirect()->route('employee.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Employee::findOrFail($request->id)->delete();
        return redirect()->route('employee.index')->with('success', 'Data berhasil dihapus!');
    }
}
