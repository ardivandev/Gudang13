@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah Barang</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Barang</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan nama barang" required>
            </div>

            <div class="form-group">
                <label for="kategori_id">Kategori</label>
                <select name="kategori_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" name="stok" class="form-control" placeholder="Masukkan jumlah stok" required>
            </div>

            <div class="form-group">
                <label for="gambar_barang">Gambar Barang</label>
                <input type="file" name="gambar_barang" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
@endsection
