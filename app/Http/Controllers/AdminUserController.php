<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon; //  memanipulasi tanggal
use Illuminate\Support\Facades\Hash; // Hash password

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        // Menghitung seluruh pengguna
        $totalUsers = User::where('type', 3)->count();

        // Menghitung pengguna aktif (status = 1)
        $activeUsers = User::where('paket_id', '>=', 1)
            ->where('type', '!=', 2)
            ->count();


        // Menghitung pengguna yang mendaftar khusus hari ini
        $newToday = User::whereDate('created_at', Carbon::today())->where('type', '!=', 2)->count();

        // Menghitung pengguna non-aktif (status = 0)
        $inactiveUsers = User::where('paket_id', 0)
            ->where('type', '!=', 2)
            ->count();

        $query = User::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        if ($request->has('sort_status') && $request->sort_status != '') {
            $query->orderBy('paket_id', $request->sort_status);
        } else {
            $query->latest();
        }

        $data_user = $query->paginate(10)->withQueryString();

        // Tambahkan variabel stats ke dalam fungsi compact()
        return view('dashboard.user', compact(
            'data_user',
            'totalUsers',
            'activeUsers',
            'newToday',
            'inactiveUsers'
        ));
    }

    public function create()
    {
        return view('dashboard.form-user');
    }

    public function store(Request $request)
    {
        // Validasi keamanan data masuk
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email', // Email tidak boleh kembar
            'password' => 'required|min:8',
            'type'     => 'required|integer',
            'status'   => 'required|integer',
        ]);

        // Enkripsi password
        $validated['password'] = Hash::make($validated['password']);

        // Simpan data
        User::create($validated);

        // Kembali ke halaman tabel dengan pesan sukses
        return redirect('/dashboard/member')->with('success');;
    }

    /**
     * Menampilkan form edit dengan membawa data lama.
     */
    public function edit($id)
    {
        // Mencari data user berdasarkan ID, jika tidak ada akan muncul 404
        $user = User::findOrFail($id);

        return view('dashboard.form-user', compact('user'));
    }

    /**
     * Memvalidasi dan menimpa data lama dengan data baru.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Aturan validasi dasar
        $rules = [
            'name'   => 'required|string|max:255',
            // Pengecualian: Boleh pakai email yang sama, asal milik user ini sendiri
            'email'  => 'required|email|unique:users,email,' . $user->id,
            'type'   => 'required|integer',
            'paket_id' => 'required|integer',
        ];

        // Jika form password diisi, maka wajib divalidasi minimal 8 karakter
        if ($request->filled('password')) {
            $rules['password'] = 'min:8';
        }

        $validated = $request->validate($rules);

        // Jika ada password baru, enkripsi. Jika kosong, abaikan.
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        }

        // Update data
        $user->update($validated);

        // Kembalikan ke halaman tabel
        return redirect('/dashboard/member')->with('successedit');;
    }

    public function destroy($id)
    {
        // Mencari data, gagal jika tidak ditemukan
        $user = User::findOrFail($id);

        // (Opsional) Logika hapus gambar profil bisa ditaruh di sini nanti

        // Hapus data dari database
        $user->delete();

        // Kembalikan ke halaman tabel
        return redirect('/dashboard/member')->with('success');
    }
}
