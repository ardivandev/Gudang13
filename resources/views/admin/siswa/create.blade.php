@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah Siswa</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Siswa</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('siswa.store') }}">
            @csrf

            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
                <label for="nis">NIS</label>
                <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS" required>
            </div>

            <div class="form-group">
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" class="form-control" placeholder="Masukkan kelas" required>
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" placeholder="Masukkan jurusan" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
@endsection
