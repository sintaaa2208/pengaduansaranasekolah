<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KategoriController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Aspirasi Routes
    Route::resource('aspirasi', AspirasiController::class);
    Route::patch('aspirasi/{aspirasi}/status', [AspirasiController::class, 'updateStatus'])->name('aspirasi.updateStatus');

    // Siswa Routes
    Route::resource('siswa', SiswaController::class);

    // Kategori Routes
    Route::resource('kategori', KategoriController::class);
});
