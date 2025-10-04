<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnggotaController; // <-- TAMBAHKAN INI

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute untuk Halaman Utama (jika diakses tanpa login)
Route::get('/', function () {
    return view('welcome');
});

// --- RUTE UNTUK AUTENTIKASI ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- RUTE UNTUK ADMIN YANG SUDAH LOGIN ---
// Semua rute di dalam grup ini wajib login terlebih dahulu
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Rute untuk dashboard (halaman pertama setelah login jika diperlukan)
    Route::get('/dashboard', function() {
        // Untuk sementara, kita langsung arahkan ke halaman anggota
        return redirect()->route('admin.anggota.index');
    })->name('admin.dashboard');

    // Rute Resource untuk mengelola Anggota (CRUD)
    // Ini akan otomatis membuat rute untuk:
    // GET /admin/anggota -> AnggotaController@index (halaman yang kita tuju)
    // GET /admin/anggota/create -> AnggotaController@create
    // dan lainnya...
    Route::resource('anggota', AnggotaController::class)->names('admin.anggota');

});