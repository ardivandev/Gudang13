@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah Kategori</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kategori</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('kategori.store') }}">
            @csrf

            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" placeholder="Masukkan nama kategori" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
