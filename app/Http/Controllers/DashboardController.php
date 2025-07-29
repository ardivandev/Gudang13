<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahSiswa = Siswa::count();
        $jumlahBarang = Barang::count();
        $jumlahPeminjaman = Peminjaman::count();
        $jumlahPengembalian = Pengembalian::count();
        $barang = Barang::with('kategori')->get();

        return view('admin.dashboard.index', compact(
            'jumlahSiswa',
            'jumlahBarang',
            'jumlahPeminjaman',
            'jumlahPengembalian',
            'barang'
        ));
    }
}
