<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaDesaController;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\IndexController;




Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');


Route::middleware(['auth'])->group(function () {
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
Route::get('/pengguna/tambah', [PenggunaController::class, 'create'])->name('pengguna.tambah');
Route::get('/pengguna/{id_pengguna}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
Route::put('/pengguna/{id_pengguna}/update', [PenggunaController::class, 'update'])->name('pengguna.update');
Route::delete('/pengguna/{id_pengguna}', [PenggunaController::class, 'destroy'])->name('pengguna.hapus');
Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');

Route::get('/berita', [BeritaDesaController::class, 'index'])->name('berita');
Route::get('/berita/tambah', [BeritaDesaController::class, 'create'])->name('berita.create');
Route::post('/berita', [BeritaDesaController::class, 'store'])->name('berita.store');
Route::get('/berita/{id}/edit', [BeritaDesaController::class, 'edit'])->name('berita.edit');
Route::put('/berita/{id}', [BeritaDesaController::class, 'update'])->name('berita.update');
Route::delete('/berita/{id}', [BeritaDesaController::class, 'destroy'])->name('berita.destroy');
});


Route::get('/', [IndexController::class, 'Home'])->name('home');

//Berita
Route::get('/berita', [IndexController::class, 'Berita'])->name('berita');
Route::get('/berita-detail', [IndexController::class, 'DetailBerita'])->name('detail-berita');

// Profile
Route::get('/profile', [IndexController::class, 'Profile'])->name('profile');

// Infografis
Route::get('/infografis', [IndexController::class, 'Infografis'])->name('infografis');
Route::get('/penduduk', [IndexController::class, 'Penduduk'])->name('penduduk');
Route::get('/stunting', [IndexController::class, 'Stunting'])->name('stunting');
Route::get('/idm', [IndexController::class, 'IDM'])->name('idm');
Route::get('/apbdes', [IndexController::class, 'APBD'])->name('apbdes');
Route::get('/bansos', [IndexController::class, 'Bansos'])->name('bansos');

// PPID
Route::get('/lembaga', [IndexController::class, 'Lembaga'])->name('lembaga');
Route::get('/bumdes', [IndexController::class, 'Bumdes'])->name('bumdes');
Route::get('/karang-taruna', [IndexController::class, 'KarangTaruna'])->name('karang-taruna');
Route::get('/koperasi', [IndexController::class, 'koperasi'])->name('koperasi');
Route::get('/pkk', [IndexController::class, 'PKK'])->name('pkk');
Route::get('/rt', [IndexController::class, 'RT'])->name('rt');

// Lembaga
Route::get('/ppid', [IndexController::class, 'PPID'])->name('ppid');
Route::get('/pelayanan', [IndexController::class, 'Pelayanan'])->name('pelayanan');
Route::get('/struktur', [IndexController::class, 'Struktur'])->name('struktur');
Route::get('/tugas', [IndexController::class, 'Tugas'])->name('tugas');
Route::get('/visi-misi', [IndexController::class, 'VisiMisi'])->name('visi-misi');




