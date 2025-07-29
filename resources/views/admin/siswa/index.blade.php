@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Data Siswa</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>
        
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>NIS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $i => $s)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $s->nama_lengkap }}</td>
                        <td>{{ $s->kelas }}</td>
                        <td>{{ $s->nis }}</td>
                        <td>
                            <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
