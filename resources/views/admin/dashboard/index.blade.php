@extends('layouts.app')

@section('content')
<h2>Dashboard Admin</h2>

<div style="display: flex; gap: 20px;">
    <div style="padding: 20px; background: #eee; border-radius: 10px;">
        <h3>Total Siswa</h3>
        <p><strong>{{ $jumlahSiswa }}</strong></p>
    </div>
    <div style="padding: 20px; background: #eee; border-radius: 10px;">
        <h3>Total Barang</h3>
        <p><strong>{{ $jumlahBarang }}</strong></p>
    </div>
    <div style="padding: 20px; background: #eee; border-radius: 10px;">
        <h3>Total Peminjaman</h3>
        <p><strong>{{ $jumlahPeminjaman }}</strong></p>
    </div>
    <div style="padding: 20px; background: #eee; border-radius: 10px;">
        <h3>Total Pengembalian</h3>
        <p><strong>{{ $jumlahPengembalian }}</strong></p>
    </div>
</div>
@endsection
