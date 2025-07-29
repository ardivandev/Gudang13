<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalian = Pengembalian::with('peminjaman')->get();
        return view('admin.pengembalian.index', compact('pengembalian'));
    }

    public function create()
    {
        $peminjaman = Peminjaman::all();
        return view('admin.pengembalian.create', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required|date',
            'kondisi_barang' => 'required'
        ]);

        Pengembalian::create($request->all());
        return redirect()->route('pengembalian.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $peminjaman = Peminjaman::all();
        return view('admin.pengembalian.edit', compact('pengembalian', 'peminjaman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required|date',
            'kondisi_barang' => 'required'
        ]);

        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->update($request->all());

        return redirect()->route('pengembalian.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->delete();
        return redirect()->route('pengembalian.index')->with('success', 'Data berhasil dihapus!');
    }
}
