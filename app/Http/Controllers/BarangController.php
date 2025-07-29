<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with('kategori')->get();
        $jumlah = $barang->count();
        return view('admin.barang.index', compact('barang', 'jumlah'));
    }

    // Untuk Pengguna
    public function showToUser()
    {
        $barang = Barang::with('kategori')->get();
        return view('pengguna.barang.index', compact('barang'));
    }

    public function create() {
        $kategori = Kategori::all();
        return view('admin.barang.create', compact('kategori'));
    }

    public function store(Request $request) {
            $request->validate([
                'nama_barang' => 'required',
                'kategori_id' => 'required',
                'stok' => 'required|integer',
                'gambar_barang' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $data = $request->only(['nama_barang', 'kategori_id', 'stok']);

            if ($request->hasFile('gambar_barang')) {
                $file = $request->file('gambar_barang');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/barang', $filename); // simpan ke storage/app/public/barang
                $data['gambar_barang'] = 'barang/' . $filename; // simpan nama path untuk ditampilkan
            }

            Barang::create($data);

            return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }


    public function edit($id) {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.barang.edit', compact('barang', 'kategori'));
    }

    public function update(Request $request, $id) {
    $request->validate([
        'nama_barang' => 'required',
        'id_kategori' => 'required',
        'stok' => 'required|integer',
        'gambar_barang' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $barang = Barang::findOrFail($id);
    $data = $request->all();

    if ($request->hasFile('gambar_barang')) {
        $file = $request->file('gambar_barang');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/barang', $filename);
        $data['gambar_barang'] = 'barang/' . $filename;
    }

    $barang->update($data);
    return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui!');
}

    public function destroy($id) {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
