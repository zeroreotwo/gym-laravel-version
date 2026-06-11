<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class AdminPaketController extends Controller
{
    public function index(Request $request)
    {
        $query = Paket::query();



        $data_paket = $query->paginate(10)->withQueryString();

        // Tambahkan variabel stats ke dalam fungsi compact()
        return view('dashboard.paket', compact(
            'data_paket',
        ));
    }


    public function create()
    {
        return view('dashboard.form-paket');
    }

    public function store(Request $request)
    {
        // Validasi keamanan data masuk
        $validated = $request->validate([
            'nama'     => 'required|string|max:255',
            'detail'   => 'required',
            'harga'    => 'required',
            'hari'     => 'required',
            'tag'      => 'required',
        ]);

        // Simpan data
        Paket::create($validated);

        // Kembali ke halaman tabel dengan pesan sukses
        return redirect('/dashboard/paket')->with('success');;
    }

    public function edit($id)
    {
        // Mencari data user berdasarkan ID, jika tidak ada akan muncul 404
        $paket = Paket::findOrFail($id);

        return view('dashboard.form-paket', compact('paket'));
    }

    /**
     * Memvalidasi dan menimpa data lama dengan data baru.
     */
    public function update(Request $request, $id)
    {
        $paket = Paket::findOrFail($id);

        // Aturan validasi dasar
        $rules = [
            'nama'     => 'required|string|max:255',
            'detail'   => 'required',
            'harga'    => 'required',
            'hari'     => 'required',
            'tag'      => 'required',
        ];



        // Update data
        $paket->update([
            'nama' => $request->nama,
            'harga'      => $request->harga,
            'hari'      => $request->hari,
            'tag'      => $request->tag,
            'detail'      => $request->detail,
        ]);

        // Kembalikan ke halaman tabel
        return redirect('/dashboard/paket')->with('successedit');;
    }


    public function destroy($id)
    {
        // Mencari data, gagal jika tidak ditemukan
        $paket = Paket::findOrFail($id);

        // (Opsional) Logika hapus gambar profil bisa ditaruh di sini nanti

        // Hapus data dari database
        $paket->delete();

        // Kembalikan ke halaman tabel
        return redirect('/dashboard/paket')->with('success');
    }
}
