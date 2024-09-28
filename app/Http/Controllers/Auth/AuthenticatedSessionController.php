<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // $user = auth()->user();
        $user = User::find(Auth::user()->id);
        // dd($user->hasRole('MASYARAKAT'));
        if ($user->hasRole('ADMIN')) {
            return redirect()->intended(route('dashboard', absolute: false));
        } elseif ($user->hasRole('KADER')) {
            return redirect()->intended(route('dashboard.kader', absolute: false));
        } elseif ($user->hasRole('MASYARAKAT')) {
            return redirect()->intended(route('dashboard.masyarakat', absolute: false));
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
