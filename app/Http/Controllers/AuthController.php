<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    // Mengakhiri sesi
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
