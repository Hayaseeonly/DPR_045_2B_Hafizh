<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Rute untuk menampilkan & proses login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rute untuk logout (harus diakses oleh yg sudah login)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');