<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'required|date',
            'phone' => 'required|string|max:30',
            'registrant_type' => 'required|string|max:50',
            'npm_nik' => 'required|string|max:50',
            'photo' => 'image|max:2048',
        ]);

        // Upload file (photo) jika ada
        $profilePicturePath = null;
        if ($request->hasFile('photo')) {
            // Pastikan "storage:link" sudah dijalankan agar file bisa diakses
            $profilePicturePath = $request->file('photo')
                ->store('users', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'registrant_type' => $request->registrant_type,
            'npm_nik' => $request->npm_nik,
            'photo' => $profilePicturePath,
        ]);

        $user->assignRole('registrant');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('front.index', absolute: false));
    }
}
