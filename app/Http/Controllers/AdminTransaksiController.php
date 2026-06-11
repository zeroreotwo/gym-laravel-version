<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil transaksi dengan relasi agar nama user tampil di view
        $data_transaksi = Transaksi::with('user')->latest()->paginate(10);
        return view('dashboard.transaksi', compact('data_transaksi'));
    }

    /**
     * Memverifikasi pembayaran, mengubah status, dan mengaktifkan masa berlaku member
     */
    public function verifikasi($id)
    {
        // Cari data transaksi beserta relasi paket dan trainernya
        $transaksi = Transaksi::with(['user', 'paket', 'trainer'])->findOrFail($id);

        // Ubah status transaksi menjadi lunas
        $transaksi->status = 'lunas';
        $transaksi->save();

        // Proses Update Data User (Member)
        $user = $transaksi->user;

        if ($user) {
            // Jika transaksi ini adalah pembelian Paket Gym
            if ($transaksi->paket_id) {
                $user->paket_id = $transaksi->paket_id;

                // Menghitung tanggal kadaluarsa: Hari ini + jumlah hari dari tabel paket
                $user->paket_day = now()->addDays($transaksi->paket->hari);
            }

            // Jika transaksi ini adalah pembelian Personal Trainer
            if ($transaksi->trainer_id) {
                $user->trainer_id = $transaksi->trainer_id;

                // Menghitung tanggal kadaluarsa: Hari ini + jumlah hari dari tabel trainer
                $user->trainer_day = now()->addDays($transaksi->trainer->hari);
            }

            // Simpan pembaruan ke tabel users
            $user->save();
        }

        // Kembalikan ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pembayaran berhasil diverifikasi. Status Lunas dan layanan Member telah diaktifkan!');
    }


    public function destroy($id)
    {
        // Mencari data, gagal jika tidak ditemukan
        $paket = Transaksi::findOrFail($id);

        // Hapus data dari database
        $paket->delete();

        // Kembalikan ke halaman tabel
        return redirect('/dashboard/transaksi')->with('success');
    }
}
