<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Models\Pengguna;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index() {
        $peminjaman = Peminjaman::with('pengguna')->get();
        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    public function create() {
        $pengguna = Pengguna::all();
        $barang = Barang::all();
        return view('admin.peminjaman.create', compact('pengguna', 'barang'));
    }

    public function store(Request $request) {
        DB::beginTransaction();
        try {
            $peminjaman = Peminjaman::create([
                'id_pengguna' => $request->id_pengguna,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_kembali' => $request->tanggal_kembali,
                'status' => 'dipinjam',
            ]);

            foreach ($request->barang_id as $index => $id_barang) {
                DetailPeminjaman::create([
                    'id_peminjaman' => $peminjaman->id,
                    'id_barang' => $id_barang,
                    'jumlah' => $request->jumlah[$index],
                ]);
            }

            DB::commit();
            return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Gagal menambahkan peminjaman.');
        }
    }

    public function edit($id)
{
    $peminjaman = Peminjaman::with('pengguna')->findOrFail($id);
    return view('admin.peminjaman.edit', compact('peminjaman'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        'status' => 'required|in:dipinjam,dikembalikan',
    ]);

    $peminjaman = Peminjaman::findOrFail($id);
    $peminjaman->update([
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tanggal_kembali' => $request->tanggal_kembali,
        'status' => $request->status,
    ]);

    return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui.');
}

    public function destroy($id) {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->detail()->delete();
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman dihapus.');
    }
}
