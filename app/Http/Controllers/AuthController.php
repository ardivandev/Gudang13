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
        $credentials = $request->only('email', 'password');

        // Coba login sebagai petugas
        if (Auth::guard('petugas')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil sebagai Petugas!');
        }


        // Coba login sebagai pengguna (guard default 'web')
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('pengguna.dashboard')->with('success', 'Login berhasil sebagai Pengguna!');
        }

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->route('pengguna.dashboard')->with('success', 'Login berhasil sebagai Pengguna!');
        // }

        // Jika gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        // Logout dari semua guard
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
            'nama_lengkap'    => 'required|string|max:100',
            'email'           => 'required|email|unique:pengguna,email',
            'username'        => 'required|string|max:50|unique:pengguna,username',
            'password'        => 'required|min:6|confirmed',
            'gambar_jaminan'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

    $data = $request->only(['nama_lengkap', 'email', 'username']);
    $data['password'] = Hash::make($request->password);

    if ($request->hasFile('gambar_jaminan')) {
        $file = $request->file('gambar_jaminan');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/pengguna', $filename);
        $data['gambar_jaminan'] = 'pengguna/' . $filename;
    }

    Pengguna::create($data);

    return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
}
}
