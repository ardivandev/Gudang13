<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::all();
        return view('admin.pengguna.index', compact('pengguna'));
    }

    public function create()
    {
        return view('admin.pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:pengguna',
            'username' => 'required|unique:pengguna',
            'password' => 'required|min:4'
        ]);

        Pengguna::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('admin.pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:pengguna,email,' . $id,
            'username' => 'required|unique:pengguna,username,' . $id,
        ]);

        $pengguna->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'username' => $request->username,
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Data pengguna diperbarui!');
    }

    public function destroy($id)
    {
        Pengguna::destroy($id);
        return redirect()->route('pengguna.index')->with('success', 'Pengguna dihapus.');
    }
    

    public function showBarang()
    {
        $barang = Barang::with('kategori')->get();
        return view('pengguna.barang', compact('barang'));
    }
}
