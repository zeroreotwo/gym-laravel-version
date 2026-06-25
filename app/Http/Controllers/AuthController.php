<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Memanggil template manual HTML kamu
    public function login()
    {
        // Pastikan nama file blade sesuai dengan tempat kamu menyimpan template
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek tipe user yang baru saja login
            $userType = Auth::user()->type;

            if ($userType == 1) {
                // Jika Admin, arahkan ke kastil admin
                return redirect()->intended('/dashboard');
            } elseif ($userType == 3) {
                // Jika Member, arahkan ke area berlatih member
                return redirect()->intended('/member/dashboard');
            }

            // Default arah jika ada tipe lain
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Kombinasi email dan password tidak sesuai dengan catatan kami.',
        ])->onlyInput('email');
    }

    // Mengakhiri sesi Web HTML
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // ==========================================
    // API METHODS (UNTUK FLUTTER)
    // ==========================================

    public function apiLogin(Request $request)
    {
        // Validasi input dari Flutter
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Periksa apakah user ada dan password-nya cocok
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Kombinasi email dan password salah.'
            ], 401); // 401 Unauthorized
        }

        // Buat token baru menggunakan Laravel Sanctum
        $token = $user->createToken('flutter-auth-token')->plainTextToken;

        // Kembalikan data berupa JSON ke Flutter
        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'type' => $user->type, // Mengirim tipe user (1 untuk Admin, 3 untuk Member)
            ]
        ], 200);
    }

    public function apiLogout(Request $request)
    {
        // Hapus token Sanctum yang sedang digunakan saat ini oleh Flutter
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil logout, token dihapus.'
        ], 200);
    }
}
