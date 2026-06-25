<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPaketController;
use App\Http\Controllers\AdminTrainerController;
use App\Http\Controllers\AdminTransaksiController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberTrainerController;
use App\Http\Controllers\MemberTransaksiController;
use Illuminate\Support\Facades\Route;

// ==========================================
// RUTE PUBLIK
// ==========================================
Route::get('/', [IndexController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

// Logout cukup satu saja, menggunakan auth middleware
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');


// ==========================================
// RUTE ADMIN (Misal: Type 1)
// ==========================================
// Semua rute di dalam grup ini wajib login (auth) DAN memiliki role 1 (Admin)
Route::middleware(['auth', 'checkRole:1'])->group(function () {

    // Dashboard Utama Admin
    Route::get('/dashboard', [AdminController::class, 'index']);

    // Manajemen User (Member) oleh Admin
    Route::prefix('dashboard/member')->group(function () {
        Route::get('/', [AdminUserController::class, 'index']);
        Route::get('/create', [AdminUserController::class, 'create']);
        Route::post('/', [AdminUserController::class, 'store']);
        Route::get('/{id}/edit', [AdminUserController::class, 'edit']);
        Route::put('/{id}', [AdminUserController::class, 'update']);
        Route::delete('/{id}', [AdminUserController::class, 'destroy']);
    });

    // Manajemen Paket oleh Admin
    Route::prefix('dashboard/paket')->group(function () {
        Route::get('/', [AdminPaketController::class, 'index']);
        Route::get('/create', [AdminPaketController::class, 'create']);
        Route::post('/', [AdminPaketController::class, 'store']);
        Route::get('/{id}/edit', [AdminPaketController::class, 'edit']);
        Route::put('/{id}', [AdminPaketController::class, 'update']);
        Route::delete('/{id}', [AdminPaketController::class, 'destroy']);
    });

    // Manajemen Trainer oleh Admin
    Route::prefix('dashboard/trainer')->group(function () {
        Route::get('/', [AdminTrainerController::class, 'index']);
        Route::get('/create', [AdminTrainerController::class, 'create']);
        Route::post('/', [AdminTrainerController::class, 'store']);
        Route::get('/{id}/edit', [AdminTrainerController::class, 'edit']);
        Route::put('/{id}', [AdminTrainerController::class, 'update']);
        Route::delete('/{id}', [AdminTrainerController::class, 'destroy']);
    });

    // Manajemen Trainer oleh Admin
    Route::prefix('dashboard/transaksi')->group(function () {
        Route::get('/', [AdminTransaksiController::class, 'index']);
        Route::delete('/{id}', [AdminTransaksiController::class, 'destroy']);
        Route::put('/{id}/verifikasi', [AdminTransaksiController::class, 'verifikasi']);
    });
});


// ==========================================
// Semua rute di dalam grup ini wajib login (auth) DAN memiliki role 3 (Member)
Route::middleware(['auth', 'checkRole:3'])->prefix('member')->group(function () {

    // Halaman utama dashboard member
    Route::get('/dashboard', [MemberController::class, 'index']);
    Route::get('/trainer', [MemberTrainerController::class, 'index']);
    Route::get('/transaksi', [MemberTransaksiController::class, 'index']);

    Route::get('/checkout/trainer/{id}', [CheckoutController::class, 'trainerCheckout'])->name('checkout.trainer');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/paket/{id}', [CheckoutController::class, 'paketCheckout'])->name('checkout.paket');
    Route::post('/checkout/paket/process', [CheckoutController::class, 'processPaket'])->name('checkout.paket.process');

    // Menampilkan halaman form ubah password
    Route::get('/change-password', [MemberController::class, 'changePassword'])->name('member.change-password');
    // Memproses pembaruan password ke database
    Route::put('/change-password', [MemberController::class, 'updatePassword'])->name('member.update-password');
});
