<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminPaketController;
use App\Http\Controllers\AdminTrainerController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MemberTransaksiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// ==========================================
// RUTE PUBLIK (Bisa diakses tanpa login)
// ==========================================
Route::post('/login', [AuthController::class, 'apiLogin']); // Method khusus untuk return Token JSON

// ==========================================
// RUTE PROTECTED (Wajib Login via Sanctum)
// ==========================================
Route::middleware('auth:sanctum')->group(function () {

    // Mengambil data profil user yang sedang login
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });

    // Proses Logout API (Menghapus Token)
    Route::post('/logout', [AuthController::class, 'apiLogout']);

    // ==========================================
    // RUTE KHUSUS MEMBER (Akses Fitur Transaksi)
    // ==========================================
    // Anda bisa tambahkan middleware checkRole jika ingin ketat seperti di web.php
    Route::middleware('checkRole:3')->prefix('member')->group(function () {

        // Riwayat transaksi milik member
        Route::get('/transaksi', [MemberTransaksiController::class, 'apiIndex']);
        Route::get('/paket', [AdminPaketController::class, 'apiIndex']); // Mengambil daftar paket
        Route::get('/trainer', [AdminTrainerController::class, 'apiIndex']); // Mengambil daftar trainer


        // Proses checkout dari Flutter
        Route::post('/checkout/process', [CheckoutController::class, 'apiProcess']);
        Route::post('/checkout/paket/process', [CheckoutController::class, 'apiProcessPaket']);
    });


    Route::middleware('checkRole:1')->prefix('admin')->group(function () {

        // Rute dashboard admin 
        Route::get('/dashboard', [AdminController::class, 'apiIndex']);
    });
});
