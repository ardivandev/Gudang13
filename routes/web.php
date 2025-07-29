<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    BarangController,
    SiswaController,
    PeminjamanController,
    PengembalianController,
    DashboardController,
    KategoriController,
    PenggunaController,
    PetugasController,
    SettingController
};
use App\Models\Barang;

// ===========================
// Redirect root ke login
// ===========================
Route::get('/', fn() => redirect('/login'));

// ===========================
// Guest Routes (Login & Register)
// ===========================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// ===========================
// Logout (All Users)
// ===========================
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ===========================
// Pengguna Routes (guard: web)
// ===========================
Route::middleware('auth:web')->group(function () {
    Route::get('/pengguna/dashboard', function () {
        $barang = Barang::with('kategori')->get();
        $statusGudang = \App\Models\Setting::first()?->status_gudang ?? 'buka';

        return view('pengguna.dashboard', compact('barang', 'statusGudang'));
    })->name('pengguna.dashboard');

    Route::get('/pengguna/barang', [BarangController::class, 'showToUser'])->name('pengguna.barang');
});

// ===========================
// Admin/Petugas Routes (guard: petugas)
// ===========================
Route::middleware('auth:petugas')->prefix('admin')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Tombol Buka/Tutup Gudang
    Route::post('/toggle-gudang', [SettingController::class, 'toggleGudang'])->name('gudang.toggle');

    // CRUD
    Route::resource('siswa', SiswaController::class)->except(['show']);
    Route::resource('barang', BarangController::class)->except(['show']);
    Route::resource('peminjaman', PeminjamanController::class)->except(['show']);
    Route::resource('pengembalian', PengembalianController::class)->except(['show']);
    Route::resource('kategori', KategoriController::class)->except(['show']);
    Route::resource('pengguna', PenggunaController::class)->except(['show']);
    Route::resource('petugas', PetugasController::class)->except(['show']);
});
