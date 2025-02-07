<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan form login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses autentikasi login.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Otentikasi berdasarkan kolom email dan password (bawaan Breeze).
        $request->authenticate();

        // Regenerasi session ID
        $request->session()->regenerate();

        // Cek apakah user yang baru login adalah admin
        if (Auth::user()->role === 'admin') {
            // Jika admin, logout dan kembalikan error
            Auth::logout();

            // Kembalikan ke halaman login dengan error
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'You are an admin. Please login via admin panel.',
                ]);
        }

        // Jika bukan admin, lanjutkan login ke halaman dashboard
        return redirect()->intended(route('front.index'));
    }

    /**
     * Proses logout session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
