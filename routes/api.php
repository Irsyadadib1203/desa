<?php

use Illuminate\Support\Facades\Route;

// routes/api.php
use App\Http\Controllers\Api\BeritaDesaController;
use App\Http\Controllers\Api\GaleriDesaController;

Route::get('/berita', [BeritaDesaController::class, 'Berita']);
Route::get('/berita/{id}', [BeritaDesaController::class, 'getBerita']);

Route::get('/galeri', [GaleriDesaController::class, 'Galeri']);
