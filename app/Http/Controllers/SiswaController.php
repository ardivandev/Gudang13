<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index() {
        $siswa = Siswa::all();
        $jumlah = $siswa->count();
        return view('admin.siswa.index', compact('siswa', 'jumlah'));
    }

    public function create() {
        return view('admin.siswa.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_lengkap' => 'required',
            'nis' => 'required|unique:siswa',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        Siswa::create($request->all());
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function edit($id) {
        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_lengkap' => 'required',
            'nis' => 'required|unique:siswa,nis,' . $id,
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui!');
    }

    public function destroy($id) {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus!');
    }
}
