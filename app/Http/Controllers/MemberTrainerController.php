<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer; // Wajib memanggil Model Trainer

class MemberTrainerController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel trainer
        $trainers = Trainer::all();

        // Melempar variabel $trainers ke file view
        return view('member.trainer', compact('trainers'));
    }
}
