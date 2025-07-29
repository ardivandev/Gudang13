@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Pengembalian</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Pengembalian</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('pengembalian.update', $pengembalian->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_peminjaman">Peminjaman</label>
                <select name="id_peminjaman" class="form-control" required>
                    @foreach($peminjaman as $p)
                        <option value="{{ $p->id }}" {{ $pengembalian->id_peminjaman == $p->id ? 'selected' : '' }}>
                            {{ $p->pengguna->nama_lengkap ?? 'Tidak Ada Nama' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                <input type="date" name="tanggal_pengembalian" class="form-control"
                       value="{{ $pengembalian->tanggal_pengembalian }}" required>
            </div>

            <div class="form-group">
                <label for="kondisi_barang">Kondisi Barang</label>
                <input type="text" name="kondisi_barang" class="form-control"
                       value="{{ $pengembalian->kondisi_barang }}" placeholder="Masukkan kondisi barang" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
