<?php

namespace App\Http\Controllers;

use App\Models\Transaksi; // Sesuaikan dengan nama Model tabel transaksi Anda
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberTransaksiController extends Controller
{
    /**
     * Menampilkan halaman riwayat transaksi member.
     */
    public function index()
    {
        // 1. Mengambil ID pengguna yang sedang login saat ini
        $userId = Auth::id();

        // 2. Mengambil data transaksi khusus untuk user tersebut
        // Menggunakan orderBy('created_at', 'desc') agar transaksi terbaru muncul di baris paling atas
        $transaksis = Transaksi::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        // 3. Melempar variabel $transaksis ke file view member.transaksi
        return view('member.transaksi', compact('transaksis'));
    }
}
