<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Menghitung pengguna aktif (status = 1)
        $activeUsers = User::where('paket_id', '>=', 1)
            ->where('type', '!=', 2)
            ->count();


        // Menghitung seluruh pengguna
        $totalUsers = User::where('type', 3)->count();

        // Menghitung total pendapatan transaksi bulan ini (status lunas)
        $pendapatanBulanIni = Transaksi::where('status', 'lunas')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('harga');

        $transaksiBulanIni = Transaksi::where('status', 'lunas')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();


        $currentYear = now()->year;

        // Ambil data transaksi lunas, kelompokkan per bulan
        $monthlyRevenues = Transaksi::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(harga) as total')
        )
            ->whereYear('created_at', $currentYear)
            ->where('status', 'lunas')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // array 12 bulan
        $revenueData = [];
        for ($i = 1; $i <= 12; $i++) {
            $revenueData[$i] = $monthlyRevenues[$i] ?? 0;
        }

        // pendapatan tertinggi untuk menentukan skala grafik
        $maxRevenue = max($revenueData);
        // Hindari pembagian dengan nol jika belum ada transaksi sama sekali
        $maxRevenue = $maxRevenue > 0 ? $maxRevenue : 1;


        $data_transaksi = Transaksi::with('user')->latest()->paginate(5);

        return view('dashboard.index', compact(

            'activeUsers',
            'totalUsers',
            'pendapatanBulanIni',
            'transaksiBulanIni',
            'revenueData',
            'maxRevenue',
            'data_transaksi'
        ));
    }
    // API for flutter
    public function apiIndex(Request $request)
    {
        // Menghitung pengguna aktif (status = 1)
        $activeUsers = User::where('paket_id', '>=', 1)
            ->where('type', '!=', 2)
            ->count();

        //  Menghitung seluruh pengguna member
        $totalUsers = User::where('type', 3)->count();

        // Menghitung total pendapatan transaksi bulan ini (status lunas)
        $pendapatanBulanIni = Transaksi::where('status', 'lunas')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('harga');

        // Menghitung jumlah transaksi bulan ini
        $transaksiBulanIni = Transaksi::where('status', 'lunas')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // Mengambil data grafik pendapatan bulanan tahun ini
        $currentYear = Carbon::now()->year;
        $monthlyRevenues = Transaksi::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(harga) as total')
        )
            ->whereYear('created_at', $currentYear)
            ->where('status', 'lunas')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $revenueData = [];
        for ($i = 1; $i <= 12; $i++) {
            $revenueData[] = (float)($monthlyRevenues[$i] ?? 0);
        }

        $maxRevenue = max($revenueData);
        $maxRevenue = $maxRevenue > 0 ? (float)$maxRevenue : 1.0;

        // Mengambil data transaksi terbaru dengan relasi usernya
        $data_transaksi = Transaksi::with('user')
            ->latest()
            ->take(10) // ambil 10 data terbaru untuk tampilan mobile
            ->get()
            ->map(function ($trx) {
                return [
                    'tanggal' => $trx->created_at->format('d M Y'),
                    'waktu' => $trx->created_at->format('H:i'),
                    'member' => $trx->user->name ?? 'User ' . $trx->user_id,
                    'layanan' => $trx->paket_id ? 'Paket Gym' : ($trx->trainer_id ? 'Trainer' : 'Layanan'),
                    'harga' => (int)$trx->harga,
                    'status' => ucfirst($trx->status),
                ];
            });

        // Kembalikan semua data dalam format JSON murni
        return response()->json([
            'success' => true,
            'data' => [
                'summary' => [
                    'pendapatan_bulan_ini' => "Rp. " . number_format($pendapatanBulanIni, 0, ',', '.'),
                    'active_members' => $activeUsers,
                    'total_members' => $totalUsers,
                    'total_orders' => $transaksiBulanIni,
                ],
                'chart' => [
                    'revenue_data' => $revenueData,
                    'max_revenue' => $maxRevenue,
                ],
                'transactions' => $data_transaksi
            ]
        ], 200);
    }
}
