@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah Akun Pengguna</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pengguna</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('pengguna.store') }}">
            @csrf

            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input name="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" placeholder="Masukkan email" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" class="form-control" placeholder="Masukkan username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
