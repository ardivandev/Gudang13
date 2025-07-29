@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Petugas</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Petugas</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $petugas->email }}" required>
            </div>

            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" value="{{ $petugas->nama_lengkap }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password Baru <small class="text-muted">(Kosongkan jika tidak ingin ganti)</small></label>
                <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak diubah">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection
