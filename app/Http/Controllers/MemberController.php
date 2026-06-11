<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function paketGym()
    {
        // Parameter kedua adalah foreign key di tabel users
        return $this->belongsTo(Paket::class, 'paket_id');
    }
    public function trainer()
    {
        // Parameter kedua adalah foreign key di tabel users
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }
    public function index()
    {
        $user = Auth::user()->load(['paketGym', 'trainer']);

        $sisaHari = 0;
        $sisaHariTrainer = 0;

        $hariIni = Carbon::now()->startOfDay();

        // --- LOGIKA PAKET GYM ---
        if ($user->paket_id != 0 && $user->paket_day != null && $user->paket_day != '0') {
            $tanggalBerakhir = Carbon::parse($user->paket_day)->startOfDay();
            $sisaHari = $hariIni->diffInDays($tanggalBerakhir, false);

            if ($sisaHari <= 0) {
                // Update database ke angka 0 sesuai permintaan
                $user->paket_id = 0;
                $user->paket_day = '0'; // Gunakan string '0' agar kompatibel dengan Eloquent
                $user->save();

                $sisaHari = 0;
            }
        }

        // --- LOGIKA PAKET TRAINER ---
        if ($user->trainer_id != 0 && $user->trainer_day != null && $user->trainer_day != '0') {
            $tanggalBerakhirTrainer = Carbon::parse($user->trainer_day)->startOfDay();
            $sisaHariTrainer = $hariIni->diffInDays($tanggalBerakhirTrainer, false);

            if ($sisaHariTrainer <= 0) {
                // Update database: Cabut akses trainer ke angka 0
                $user->trainer_id = 0;
                $user->trainer_day = '0'; // Gunakan string '0'
                $user->save();

                $sisaHariTrainer = 0;
            }
        }

        // Melempar kedua variabel ke view HTML
        return view('member.index', compact('user', 'sisaHari', 'sisaHariTrainer'));
    }
    public function changePassword()
    {
        return view('member.change-password');
    }

    /**
     * Memproses pembaruan password
     */
    public function updatePassword(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed', // 'confirmed' akan mengecek field 'password_confirmation'
        ], [
            'password.min' => 'Password baru minimal harus 8 karakter.',
            'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
        ]);

        $user = Auth::user();

        // Verifikasi apakah password lama (current) yang diketikkan cocok dengan di database
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini yang Anda masukkan salah.']);
        }

        // Enkripsi dan simpan password baru
        $userModel = \App\Models\User::find($user->id);
        $userModel->password = Hash::make($request->password);
        $userModel->save();

        return back()->with('success', 'Kata sandi Anda berhasil diperbarui!');
    }
}
