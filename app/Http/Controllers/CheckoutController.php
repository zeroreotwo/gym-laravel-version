<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function trainerCheckout($id)
    {
        $trainer = Trainer::findOrFail($id);
        return view('member.checkout', compact('trainer'));
    }

    public function process(Request $request)
    {
        // Validasi Input dan File Gambar
        $request->validate([
            'trainer_id' => 'required',
            'metode_pembayaran' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maksimal 2MB
        ]);

        $trainer = Trainer::findOrFail($request->trainer_id);

        // Proses Unggah File Gambar
        $namaFile = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            // Membuat nama unik agar file tidak tertimpa jika namanya sama
            $namaFile = time() . '_' . $file->getClientOriginalName();
            // Simpan ke folder public/assets/images/gambar
            $file->move(public_path('assets/images/gambar'), $namaFile);
        }

        // Simpan ke Database
        $transaksi = new Transaksi();
        $transaksi->user_id = Auth::id();
        $transaksi->trainer_id = $trainer->id;
        $transaksi->paket_id = null;
        $transaksi->harga = str_replace('.', '', $trainer->harga);
        $transaksi->discount = 0;
        $transaksi->status = 'pending';
        $transaksi->gambar = $namaFile; // Field baru Anda
        $transaksi->save();

        return redirect('/member/transaksi')->with('success', 'Bukti pembayaran berhasil diunggah. Mohon tunggu verifikasi admin.');
    }

    public function paketCheckout($id)
    {
        // Mencari data Paket
        $paket = \App\Models\Paket::findOrFail($id);
        return view('member.checkout', compact('paket'));
    }

    public function processPaket(Request $request)
    {
        // Validasi Input
        $request->validate([
            'paket_id' => 'required',
            'metode_pembayaran' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $paket = \App\Models\Paket::findOrFail($request->paket_id);

        // Upload Gambar
        $namaFile = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images/gambar'), $namaFile);
        }

        // impan Transaksi Paket ke Database
        $transaksi = new \App\Models\Transaksi();
        $transaksi->user_id = Auth::id();
        $transaksi->paket_id = $paket->id; // Isi paket_id
        $transaksi->trainer_id = null;     // Kosongkan trainer_id karena ini beli paket
        $transaksi->harga = str_replace('.', '', $paket->harga);
        $transaksi->discount = 0;
        $transaksi->status = 'pending';
        $transaksi->gambar = $namaFile;
        $transaksi->save();

        return redirect('/member/transaksi')->with('success', 'Bukti pembayaran Paket berhasil diunggah. Mohon tunggu verifikasi admin.');
    }
}
