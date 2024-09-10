<?php

namespace App\Http\Controllers\Auth;

use App\Models\Ibu;
use App\Models\Anak;
use App\Models\User;
use App\Models\Lansia;
use App\Models\Remaja;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register', [
            'users' => User::with('roles')->get(),
            'anaks' => $this->getAllData(Anak::class),
            'ibus' => $this->getAllData(Ibu::class),
            'remajas' => $this->getAllData(Remaja::class),
            'lansias' => $this->getAllData(Lansia::class),
            'kaders' => $this->getAllData(Employee::class),
            'roles' => Role::whereNotIn('name', ['ADMIN'])->get(),
        ]);
    }

    private function getAllData($model)
    {
        return $model::latest()->get();
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'anak_id' => ['sometimes', 'unique:' . User::class],
            'ibu_id' => ['sometimes', 'unique:' . User::class],
            'remaja_id' => ['sometimes', 'unique:' . User::class],
            'lansia_id' => ['sometimes', 'unique:' . User::class],
            'employee_id' => ['sometimes', 'unique:' . User::class],
            'role' => ['required', 'in:KADER,MASYARAKAT'],
            'tipe_entitas' => ['required', 'in:anak,remaja,ibu,lansia,petugas'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $tipe_entitas = $request->tipe_entitas;

        if ($tipe_entitas === 'anak') {
            $user = User::create([
                'anak_id' => $request->anak_id,
                'tipe_entitas' => $tipe_entitas,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole('MASYARAKAT');
        } elseif ($tipe_entitas === 'remaja') {
            $user = User::create([
                'remaja_id' => $request->remaja_id,
                'tipe_entitas' => $tipe_entitas,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole('MASYARAKAT');
        } elseif ($tipe_entitas === 'lansia') {
            $user = User::create([
                'lansia_id' => $request->lansia_id,
                'tipe_entitas' => $tipe_entitas,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole('MASYARAKAT');
        } elseif ($tipe_entitas === 'ibu') {
            $user = User::create([
                'ibu_id' => $request->ibu_id,
                'tipe_entitas' => $tipe_entitas,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole('MASYARAKAT');
        } elseif ($tipe_entitas === 'petugas') {
            $user = User::create([
                'employee_id' => $request->employee_id,
                'tipe_entitas' => $tipe_entitas,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole('KADER');
        }

        event(new Registered($user));

        // Auth::login($user);

        return redirect()->route('register')->with('success', 'Berhasil menambahkan user baru!');
    }

    public function destroy (Request $request)
    {
        User::findOrFail($request->id)->delete();
        return back()->with('success',"Data berhasil dihapus!");
    }
}
