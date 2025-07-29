@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Akun Pengguna</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Pengguna</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('pengguna.update', $pengguna->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input name="nama_lengkap" class="form-control" value="{{ $pengguna->nama_lengkap }}" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" value="{{ $pengguna->email }}" placeholder="Masukkan email" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" class="form-control" value="{{ $pengguna->username }}" placeholder="Masukkan username" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
