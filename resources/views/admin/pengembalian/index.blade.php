@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Data Pengembalian</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pengembalian</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('pengembalian.create') }}" class="btn btn-primary mb-3">Tambah Pengembalian</a>
        
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Kondisi Barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengembalian as $i => $k)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $k->peminjaman->pengguna->nama_lengkap ?? '-' }}</td>
                        <td>{{ $k->tanggal_pengembalian }}</td>
                        <td>{{ $k->kondisi_barang }}</td>
                        <td>
                            <a href="{{ route('pengembalian.edit', $k->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('pengembalian.destroy', $k->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
