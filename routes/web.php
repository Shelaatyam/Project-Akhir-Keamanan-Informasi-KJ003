<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\HomeController;

Auth::routes();  // Menambahkan autentikasi standar (login, register, dll)

// Route Admin dengan Middleware Admin
Route::middleware(['auth', 'admin'])->group(function () {
    // Route untuk Karyawan
    Route::resource('karyawan', KaryawanController::class);
    
    // Route untuk Gaji
    Route::resource('gaji', GajiController::class);

    // Route untuk Dashboard Admin
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');  // Tampilan dashboard admin
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'admin'])->get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
