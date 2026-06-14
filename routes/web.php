<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PendudukController;

// Halaman utama langsung ke LOGIN
Route::get('/', function () {
    return redirect('/login');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (harus login dulu)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('provinsi', ProvinsiController::class)->except(['show']);
    Route::resource('alamat', AlamatController::class)->except(['show']);
    Route::resource('keluarga', KeluargaController::class);
    Route::resource('penduduk', PendudukController::class);
});
