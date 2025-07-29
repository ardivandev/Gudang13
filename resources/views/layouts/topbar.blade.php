<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <span class="nav-link dropdown-toggle">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <i class="fas fa-user-circle fa-lg"></i>
            </span>
        </li>
    </ul>
</nav>
@php
    $statusGudang = \App\Models\Setting::first()->status_gudang ?? 'buka';
@endphp

<form action="{{ route('gudang.toggle') }}" method="POST" class="d-inline-block mr-3">
    @csrf
    <button type="submit" class="btn btn-sm {{ $statusGudang == 'buka' ? 'btn-danger' : 'btn-success' }}">
        {{ $statusGudang == 'buka' ? 'Tutup Gudang' : 'Buka Gudang' }}
    </button>
</form>
