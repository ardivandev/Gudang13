<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">G13</div>
    </a>
    <hr class="sidebar-divider">
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('siswa.index') }}">
            <i class="bi bi-person"></i> Siswa
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('barang.index') }}">
            <i class="bi bi-box"></i> Barang
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kategori.index') }}">
            <i class="bi bi-tags"></i> Kategori
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('peminjaman.index') }}">
            <i class="bi bi-arrow-left-right"></i> Peminjaman
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pengembalian.index') }}">
            <i class="bi bi-arrow-counterclockwise"></i> Pengembalian
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pengguna.index') }}">
            <i class="bi bi-people"></i> Pengguna
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('petugas.index') }}">
            <i class="bi bi-person-gear"></i> Petugas
        </a>
    </li>
</ul>
