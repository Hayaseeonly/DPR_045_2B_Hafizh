<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnggotaController; // Pastikan ini ada

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk Login dan Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- RUTE UNTUK ADMIN ---
// Semua rute di dalam grup ini akan memiliki awalan URL /admin
// dan awalan nama 'admin.'
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
Route::resource('komponen-gaji', KomponenGajiController::class);
    // Arahkan /admin ke halaman daftar anggota
    Route::get('/', function() {
        return redirect()->route('admin.anggota.index');
    });

    // Ini akan membuat rute dengan nama:
    // admin.anggota.index
    // admin.anggota.create
    // admin.anggota.store
    // admin.anggota.edit
    // admin.anggota.update
    // admin.anggota.destroy
    Route::resource('anggota', AnggotaController::class);

    // Nanti resource controller untuk Komponen Gaji dan Penggajian juga ditaruh di sini
});