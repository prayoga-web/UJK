<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

/**
 * ========================================
 * RUTE PUBLIK (Tanpa Autentikasi)
 * ========================================
 */

// Menampilkan halaman form login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Proses login - menerima POST request dari form login
Route::post('/login', [AuthController::class, 'login']);

// Proses logout - menghapus session dan redirect ke login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/**
 * ========================================
 * RUTE TERLINDUNGI (Memerlukan Autentikasi)
 * ========================================
 * 
 * Semua rute di dalam group ini memerlukan user untuk sudah login
 * (middleware 'auth' akan mengecek status login)
 */
Route::middleware(['auth'])->group(function () {
    /**
     * Rute Root (/)
     * Mengarahkan user langsung ke dashboard saat mengakses root URL
     */
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    /**
     * Rute Dashboard
     * Menampilkan halaman utama dengan statistik inventaris barang
     */
    Route::get('/dashboard', [ItemController::class, 'dashboard'])->name('dashboard');

    /**
     * Rute Resource CRUD untuk Barang
     * Otomatis membuat 7 rute:
     * - GET    /items              -> index (daftar barang)
     * - GET    /items/create       -> create (form tambah)
     * - POST   /items              -> store (simpan data baru)
     * - GET    /items/{id}         -> show (lihat detail)
     * - GET    /items/{id}/edit    -> edit (form edit)
     * - PUT    /items/{id}         -> update (update data)
     * - DELETE /items/{id}         -> destroy (hapus data)
     */
    Route::resource('items', ItemController::class);
});