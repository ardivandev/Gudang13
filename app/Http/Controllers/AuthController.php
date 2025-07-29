<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
            // Coba login sebagai petugas
    if (Auth::guard('petugas')->attempt(['email' => $request->email, 'password' => $request->password])) {
        $request->session()->regenerate();

        return redirect('/admin/dashboard');
    }

    // Coba login sebagai pengguna biasa
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $request->session()->regenerate();

        return redirect('/pengguna/dashboard');
    }

    // Jika gagal dua-duanya
    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        Auth::guard('petugas')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'email' => 'required|email|unique:pengguna,email',
            'username' => 'required|string|max:50|unique:pengguna,username',
            'password' => 'required|min:6|confirmed',
            'gambar_jaminan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Pengguna::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'username' => $request->username,
            'gambar_jaminan' => $request->file('gambar_jaminan') ?
                $request->file('gambar_jaminan')->store('images', 'public') : null,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // otomatis login setelah register

        return redirect('/dashboard');
    }
}
