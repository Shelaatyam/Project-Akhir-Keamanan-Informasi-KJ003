<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Menampilkan daftar karyawan
     */
    public function index()
    {
        $karyawans = Karyawan::all();  // Mengambil semua data karyawan
        return view('karyawan.index', compact('karyawans'));
    }

    /**
     * Menampilkan form untuk menambah karyawan
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Menyimpan data karyawan baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_ktp' => 'required|numeric|unique:karyawans',
        ]);

        // Simpan data karyawan
        Karyawan::create($validated);

        return redirect()->route('karyawan.index');
    }

    /**
     * Menampilkan form untuk mengedit data karyawan
     */
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Mengupdate data karyawan
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_ktp' => 'required|numeric|unique:karyawans,no_ktp,' . $id,
        ]);

        // Cari dan update data karyawan
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($validated);

        return redirect()->route('karyawan.index');
    }

    /**
     * Menghapus data karyawan
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return redirect()->route('karyawan.index');
    }
}
