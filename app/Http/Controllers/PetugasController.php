<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
        return view('admin.petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('admin.petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:petugas',
            'nama_lengkap' => 'required',
            'password' => 'required|min:6'
        ]);

        Petugas::create([
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('admin.petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $petugas = Petugas::findOrFail($id);

        $request->validate([
            'email' => 'required|email|unique:petugas,email,'.$id,
            'nama_lengkap' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $petugas->update($data);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Petugas::findOrFail($id)->delete();
        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus!');
    }
}
