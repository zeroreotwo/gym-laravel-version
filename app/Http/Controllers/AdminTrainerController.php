<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class AdminTrainerController extends Controller
{
    public function index(Request $request)
    {
        $query = Trainer::query();



        $data_trainer = $query->paginate(10)->withQueryString();

        // Tambahkan variabel stats ke dalam fungsi compact()
        return view('dashboard.trainer', compact(
            'data_trainer',
        ));
    }


    public function create()
    {
        return view('dashboard.form-trainer');
    }

    public function store(Request $request)
    {
        // Validasi keamanan data masuk
        $validated = $request->validate([
            'nama'     => 'required|string|max:255',
            'detail'   => 'required',
            'harga'    => 'required',
            'hari'      => 'required',
        ]);

        // Simpan data
        Trainer::create($validated);

        // Kembali ke halaman tabel dengan pesan sukses
        return redirect('/dashboard/trainer')->with('success');;
    }

    public function edit($id)
    {
        // Mencari data user berdasarkan ID, jika tidak ada akan muncul 404
        $trainer = Trainer::findOrFail($id);

        return view('dashboard.form-trainer', compact('trainer'));
    }

    /**
     * Memvalidasi dan menimpa data lama dengan data baru.
     */
    public function update(Request $request, $id)
    {
        $trainer = Trainer::findOrFail($id);

        // Aturan validasi dasar
        $rules = [
            'nama'     => 'required|string|max:255',
            'detail'   => 'required',
            'harga'    => 'required',
            'hari'      => 'required',
        ];



        // Update data
        $trainer->update([
            'nama' => $request->nama,
            'harga'      => $request->harga,
            'hari'      => $request->hari,
            'detail'      => $request->detail,
        ]);

        // Kembalikan ke halaman tabel
        return redirect('/dashboard/trainer')->with('successedit');;
    }


    public function destroy($id)
    {
        // Mencari data, gagal jika tidak ditemukan
        $trainer = Trainer::findOrFail($id);

        // (Opsional) Logika hapus gambar profil bisa ditaruh di sini nanti

        // Hapus data dari database
        $trainer->delete();

        // Kembalikan ke halaman tabel
        return redirect('/dashboard/trainer')->with('success');
    }
}
