@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah Peminjaman</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Peminjaman</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('peminjaman.store') }}">
            @csrf

            <div class="form-group">
                <label for="id_pengguna">Nama Pengguna</label>
                <select name="id_pengguna" class="form-control" required>
                    @foreach ($pengguna as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="form-control" required>
            </div>

            <hr>
            <h5 class="font-weight-bold text-secondary">Barang yang Dipinjam</h5>
            <div id="barang-wrapper">
                <div class="form-row barang-group mb-2">
                    <div class="col-md-8">
                        <select name="barang_id[]" class="form-control" required>
                            @foreach ($barang as $b)
                            <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input name="jumlah[]" type="number" class="form-control" placeholder="Jumlah" required>
                    </div>
                </div>
            </div>

            <button type="button" onclick="tambahBarang()" class="btn btn-sm btn-info mb-3">+ Tambah Barang</button>

            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
    </div>
</div>

<script>
function tambahBarang() {
    const wrapper = document.getElementById('barang-wrapper');
    const group = document.querySelector('.barang-group');
    const clone = group.cloneNode(true);

    // Bersihkan value input jumlah pada clone
    clone.querySelectorAll('input').forEach(input => input.value = '');
    wrapper.appendChild(clone);
}
</script>
@endsection
