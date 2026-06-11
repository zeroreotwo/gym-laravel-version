<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Pastikan user sudah login dan memiliki type yang sesuai dengan parameter
        if (Auth::check() && Auth::user()->type == $role) {
            return $next($request);
        }

        // Jika tidak sesuai, arahkan kembali (misalnya ke halaman utama atau error 403)
        // Boleh juga diarahkan ke dashboard admin jika dia ternyata admin
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
