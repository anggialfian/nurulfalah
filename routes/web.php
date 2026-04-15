<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;

// ======================
// 🔵 PUBLIC (JAMAAH)
// ======================

// Dashboard (halaman utama)
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Laporan (bisa dilihat semua)
Route::get('/laporan', [TransactionController::class, 'laporan'])->name('laporan');


// ======================
// 🔴 ADMIN (HARUS LOGIN)
// ======================

Route::middleware('auth')->group(function () {

    // Transaksi (CRUD)
    Route::resource('transactions', TransactionController::class);

    // Kegiatan (CRUD)
    Route::resource('kegiatan', KegiatanController::class);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';