<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PklController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Define the homepage route using HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');

// PKL submission routes
Route::get('/pengajuan', [PklController::class, 'showForm'])->name('pengajuan');
Route::post('/submit', [PklController::class, 'submitForm'])->name('submit.pkl');

// Summary route
Route::get('/summary', [PklController::class, 'showSummary'])->name('summary');

// Miscellaneous routes
Route::get('/cek-form-pengajuan', [PklController::class, 'showCekForm'])->name('cek.form.pengajuan');
Route::post('/cek-form-pengajuan', [PklController::class, 'cekFormPengajuan'])->name('cek.form.pengajuan.submit');
Route::get('/syarat-ketentuan', [PklController::class, 'showSyarat'])->name('syarat.ketentuan');

// Dashboard and Profile routes protected by 'auth' middleware
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('/mahasiswa/update/{id}', [DashboardController::class, 'update'])->name('update-mahasiswa');
    // Route untuk simpan kegiatan PKL
    Route::post('/simpan-kegiatan/{id}', [DashboardController::class, 'simpanKegiatan'])->name('simpan-kegiatan');
    // Route untuk hapus kegiatan PKL
    Route::delete('delete-kegiatan/{id}', [DashboardController::class, 'deleteKegiatan'])->name('delete-kegiatan');
    // Route untuk upload laporan
    Route::post('/upload-laporan/{id}', [DashboardController::class, 'uploadLaporan'])->name('upload-laporan');
    Route::post('/update-laporan/{id}', [DashboardController::class, 'updateLaporan'])->name('update-laporan');
    //  Route untuk profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include other route files
require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
require __DIR__.'/teacher-auth.php';
