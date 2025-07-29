@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Kategori</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Kategori</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" placeholder="Masukkan nama kategori" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
