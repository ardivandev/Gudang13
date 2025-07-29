@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Data Barang</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>
        
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $i => $b)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $b->nama_barang }}</td>
                        <td>{{ $b->kategori->nama_kategori ?? '-' }}</td>
                        <td>{{ $b->stok }}</td>
                        <td>
                            @if ($b->gambar_barang)
                                <img src="{{ asset('storage/public/' . $b->gambar_barang) }}" alt="{{ $b->nama_barang }}" class="img-thumbnail" style="width: 100px;">
                            @else
                                <img src="https://placehold.co/100x100" alt="Placeholder" class="img-thumbnail">
                            @endif
                        <td>
                            <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('barang.destroy', $b->id) }}" method="POST" class="d-inline">
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
