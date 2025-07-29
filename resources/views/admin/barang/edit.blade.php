@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Barang</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Barang</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('barang.update', $barang->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" placeholder="Masukkan nama barang" required>
            </div>

            <div class="form-group">
                <label for="id_kategori">Kategori</label>
                <select name="id_kategori" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ $k->id == $barang->id_kategori ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" name="stok" class="form-control" value="{{ $barang->stok }}" placeholder="Masukkan jumlah stok" required>
            </div>

            <div class="form-group">
                <label for="gambar_barang">Gambar Barang</label>
                <input type="file" name="gambar_barang" class="form-control-file">
                @if ($barang->gambar_barang)
                    <img src="{{ asset('public/barang/' . $barang->gambar_barang) }}" alt="{{ $barang->nama_barang }}" class="img-thumbnail mt-2" style="width: 100px;">
                @else
                    <img src="https://placehold.co/100x100" alt="Placeholder" class="img-thumbnail mt-2">
                @endif

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
