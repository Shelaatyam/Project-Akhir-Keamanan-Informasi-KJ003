<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;  // Untuk enkripsi data

class GajiController extends Controller
{
    /**
     * Menampilkan daftar gaji
     */
    public function index()
    {
        $gajis = Gaji::with('karyawan')->get();  // Mengambil data gaji beserta data karyawan
        return view('gaji.index', compact('gajis'));
    }

    /**
     * Menampilkan form untuk menambah data gaji
     */
    public function create()
    {
        $karyawans = Karyawan::all();  // Mengambil data karyawan untuk dropdown
        return view('gaji.create', compact('karyawans'));
    }

    /**
     * Menyimpan data gaji baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
            'total_gaji' => 'required|numeric',
        ]);

        // Enkripsi jumlah gaji
        $validated['total_gaji'] = Crypt::encryptString($validated['total_gaji']);

        // Simpan data gaji
        Gaji::create($validated);

        return redirect()->route('gaji.index');
    }

    /**
     * Menampilkan form untuk mengedit data gaji
     */
    public function edit($id)
    {
        $gaji = Gaji::findOrFail($id);
        $karyawans = Karyawan::all();
        return view('gaji.edit', compact('gaji', 'karyawans'));
    }

    /**
     * Mengupdate data gaji
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
            'total_gaji' => 'required|numeric',
        ]);

        // Enkripsi jumlah gaji
        $validated['total_gaji'] = Crypt::encryptString($validated['total_gaji']);

        // Cari dan update data gaji
        $gaji = Gaji::findOrFail($id);
        $gaji->update($validated);

        return redirect()->route('gaji.index');
    }

    /**
     * Menghapus data gaji
     */
    public function destroy($id)
    {
        $gaji = Gaji::findOrFail($id);
        $gaji->delete();
        return redirect()->route('gaji.index');
    }
}
