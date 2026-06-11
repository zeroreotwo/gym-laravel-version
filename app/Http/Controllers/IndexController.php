<?php

namespace App\Http\Controllers;

use App\Models\Paket; // Pastikan Model Paket di-import
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil semua data paket gym dari database
        $pakets = Paket::all();
        $activeUsers = User::where('paket_id', '>=', 1)
            ->where('type', '!=', 2)
            ->count();
        // Melempar data paket ke view index
        return view('index', compact('pakets', 'activeUsers'));
    }
}
