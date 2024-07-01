<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DokumentasiController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::get('/dokumentasi', [DokumentasiController::class, 'index'])->name('dokumentasi.index');

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {    
    Route::get('/dokumentasi/create', [DokumentasiController::class, 'create'])->name('dokumentasi.create');
    Route::post('/dokumentasi', [DokumentasiController::class, 'store'])->name('dokumentasi.store');
    Route::delete('/dokumentasi/{id}', [DokumentasiController::class, 'destroy'])->name('dokumentasi.delete');
    Route::get('/dokumentasi', [DokumentasiController::class, 'index'])->name('dokumentasi.index');

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['verified'])->name('dashboard');
    Route::get('/edit-mahasiswa/{id}', [DashboardController::class, 'editMahasiswa'])->name('edit-mahasiswa');
    Route::put('/update-mahasiswa/{id}', [DashboardController::class, 'updateMahasiswa'])->name('update-mahasiswa');
    Route::get('/edit-presentasi/{id}', [DashboardController::class, 'editPresentasi'])->name('edit-presentasi');
    Route::put('/update-presentasi/{id}', [DashboardController::class, 'updatePresentasi'])->name('update-presentasi');
    Route::post('/approve-user/{id}', [DashboardController::class, 'approveUser'])->name('approveUser');
    Route::post('/update-nilai/{id}', [DashboardController::class, 'updateNilai'])->name('update-nilai');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.updated');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

