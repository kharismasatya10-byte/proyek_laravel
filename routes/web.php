<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

// 1. Route untuk pengguna yang belum login (Guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

// 2. Route untuk pengguna yang sudah login (Auth)
Route::middleware('auth')->group(function () {
    Route::get('/', fn () => view('dashboard'))->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // -- BAGIAN SURAT MASUK (Tahap 6) --
    
    // Akses tambah, edit, hapus diletakkan di ATAS agar route 'create' dieksekusi lebih dulu
    Route::resource('surat-masuk', SuratMasukController::class)
        ->except(['index', 'show'])
        ->parameters(['surat-masuk' => 'id'])
        ->middleware('can:manage-letters');
        
    // Akses baca daftar dan detail (dengan parameter {id}) diletakkan di BAWAH
    Route::resource('surat-masuk', SuratMasukController::class)
        ->only(['index', 'show'])
        ->parameters(['surat-masuk' => 'id']);

    // -- BAGIAN SURAT KELUAR (Latihan Mandiri) --
    
    // Akses tambah, edit, hapus (Hanya Petugas) diletakkan di ATAS
    Route::resource('surat-keluar', SuratKeluarController::class)
        ->except(['index', 'show'])
        ->parameters(['surat-keluar' => 'id'])
        ->middleware('can:manage-letters');

    // Akses baca daftar dan detail (Semua role) diletakkan di BAWAH
    Route::resource('surat-keluar', SuratKeluarController::class)
        ->only(['index', 'show'])
        ->parameters(['surat-keluar' => 'id']);

});