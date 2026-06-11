<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Menghitung pengguna aktif (status = 1)
        $activeUsers = User::where('paket_id', '>=', 1)
            ->where('type', '!=', 2)
            ->count();

        return view('dashboard.index', compact(

            'activeUsers',
        ));
    }
}
