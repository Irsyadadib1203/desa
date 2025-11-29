<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaDesaController;
use App\Http\Controllers\GaleriDesaController;
use App\Http\Controllers\KategoriPendudukController;
use App\Http\Controllers\UmurController;
use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\PendapatanPembiayaanController;
use App\Http\Controllers\TotalApbdesController;
use App\Http\Controllers\SotkController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\BansosController;


use PHPUnit\Framework\Attributes\Group;


Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');
});

Route::middleware(['auth'])->group(function () {
Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('admin.dashboard');
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

Route::get('/admin/sotk', [SotkController::class, 'index'])->name('sotk');
Route::post('/admin/sotk', [SotkController::class, 'store'])->name('sotk.store');
Route::put('/admin/sotk/{id}', [SotkController::class, 'update'])->name('sotk.update');
Route::delete('/admin/sotk/{id}', [SotkController::class, 'destroy'])->name('sotk.destroy');

Route::get('/galeri', [GaleriDesaController::class, 'index'])->name('galeri');
Route::post('/galeri', [GaleriDesaController::class, 'store'])->name('galeri.store');
Route::put('/galeri/{id}', [GaleriDesaController::class, 'update'])->name('galeri.update');
Route::delete('/galeri/{id}', [GaleriDesaController::class, 'destroy'])->name('galeri.destroy');

// data Penduduk
Route::get('/admin/infografis/penduduk', [KategoriPendudukController::class, 'penduduk'])->name('penduduk');
Route::get('/admin/infografis/perkawinan', [KategoriPendudukController::class, 'perkawinan'])->name('perkawinan');
Route::get('/admin/infografis/pekerjaan', [KategoriPendudukController::class, 'pekerjaan'])->name('pekerjaan');
Route::get('/admin/infografis/pendidikan', [KategoriPendudukController::class, 'pendidikan'])->name('pendidikan');
Route::get('/admin/infografis/agama', [KategoriPendudukController::class, 'agama'])->name('agama');
Route::post('/kategori-penduduk', [KategoriPendudukController::class, 'store'])->name('kategori.store');
Route::put('/kategori-penduduk/{id}', [KategoriPendudukController::class, 'update'])->name('kategori.update');
Route::delete('/kategori-penduduk/{id}', [KategoriPendudukController::class, 'destroy'])->name('kategori.destroy');

Route::get('/admin/infografis/umur', [UmurController::class, 'index'])->name('umur');
Route::post('/admin/infografis/umur', [UmurController::class, 'store'])->name('umur.store');
Route::put('/admin/infografis/umur/{id}', [UmurController::class, 'update'])->name('umur.update');
Route::delete('/admin/infografis/umur/{id}', [UmurController::class, 'destroy'])->name('umur.destroy');


// ==========================
// ROUTE: BELANJA DESA
// ==========================
Route::get('/belanja', [BelanjaController::class, 'index'])->name('belanja');
Route::post('/belanja', [BelanjaController::class, 'store'])->name('belanja.store');
Route::put('/belanja/{id}', [BelanjaController::class, 'update'])->name('belanja.update');
Route::delete('/belanja/delete/{id}', [BelanjaController::class, 'destroy'])->name('belanja.destroy');

// sub belanja
Route::post('/sub-belanja', [BelanjaController::class, 'storeSub'])->name('sub.store');
Route::put('/sub-belanja/{id}', [BelanjaController::class, 'updateSub'])->name('sub.update');
Route::delete('/sub-belanja/delete/{id}', [BelanjaController::class, 'destroySub'])->name('sub.destroy');
Route::get('/sub-belanja/{id}', [BelanjaController::class, 'showSub'])->name('sub.show');

// Pendapatan
Route::get('/pendapatan', [PendapatanPembiayaanController::class, 'index'])
    ->defaults('jenis', 'pendapatan')->name('pendapatan');
Route::post('/pendapatan/store', [PendapatanPembiayaanController::class, 'store'])->name('pendapatan.store');
Route::put('/pendapatan/update/{id}', [PendapatanPembiayaanController::class, 'update'])->name('pendapatan.update');
Route::delete('/pendapatan/delete/{id}', [PendapatanPembiayaanController::class, 'destroy'])->name('pendapatan.destroy');

// Pembiayaan
Route::get('/pembiayaan', [PendapatanPembiayaanController::class, 'index'])
    ->defaults('jenis', 'pembiayaan')->name('pembiayaan');
Route::post('/pembiayaan/store', [PendapatanPembiayaanController::class, 'store'])->name('pembiayaan.store');
Route::put('/pembiayaan/update/{id}', [PendapatanPembiayaanController::class, 'update'])->name('pembiayaan.update');
Route::delete('/pembiayaan/delete/{id}', [PendapatanPembiayaanController::class, 'destroy'])->name('pembiayaan.destroy');

// Total APBDes
Route::get('/total-apbdes', [TotalApbdesController::class, 'index'])->name('total.apbdes');


Route::get('/lembaga', [LembagaController::class, 'index'])->name('lembaga');

// CRUD
Route::post('/lembaga/store', [LembagaController::class, 'storeLembaga'])->name('lembaga.store');
Route::put('/lembaga/update/{id}', [LembagaController::class, 'updateLembaga'])->name('lembaga.update');
Route::delete('/lembaga/{id}/delete', [LembagaController::class, 'deleteLembaga'])->name('lembaga.destroy');

Route::post('/pengurus/store', [LembagaController::class, 'storePengurus'])->name('pengurus.store');
Route::put('/pengurus/update/{id}', [LembagaController::class, 'updatePengurus'])->name('pengurus.update');
Route::delete('/pengurus/{id}/delete', [LembagaController::class, 'deletePengurus'])->name('pengurus.destroy');

Route::post('/anggota/store', [LembagaController::class, 'storeAnggota'])->name('anggota.store');
Route::put('/anggota/update/{id}', [LembagaController::class, 'updateAnggota'])->name('anggota.update');
Route::delete('/anggota/{id}/delete', [LembagaController::class, 'deleteAnggota'])->name('anggota.destroy');

Route::get('/admin/infografis/bansos', [BansosController::class, 'index'])->name('bansos');
Route::post('/admin/infografis/bansos', [BansosController::class, 'store'])->name('bansos.store');
Route::put('/admin/infografis/bansos/{id}', [BansosController::class, 'update'])->name('bansos.update');
Route::delete('/admin/infografis/bansos/delete/{id}', [BansosController::class, 'destroy'])->name('bansos.destroy');

});
