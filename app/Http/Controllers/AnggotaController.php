<?php

namespace App\Http\Controllers;

use App\Models\Anggota; // <-- Pastikan ini ada
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Menampilkan daftar semua data anggota.
     */
    public function index()
    {
        $anggota = Anggota::latest('id_anggota')->paginate(10);
        return view('admin.anggota.index', compact('anggota'));
    }

    /**
     * Menampilkan form untuk menambah data baru.
     */
    public function create()
    {
        return view('admin.anggota.create');
    }

    /**
     * Menyimpan data baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'id_anggota' => 'nullable|integer|max:5',
            'gelar_depan' => 'nullable|string|max:50',
            'nama_depan' => 'required|string|max:100',
            'nama_belakang' => 'required|string|max:100',
            'gelar_belakang' => 'nullable|string|max:50',
            'jabatan' => 'required|string',
            'status_pernikahan' => 'required|string',
            'jumlah_anak' => 'required|integer|min:0',
        ]);

        Anggota::create($request->all());

        return redirect()->route('admin.anggota.index')
                         ->with('success', 'Data Anggota baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     * (Untuk proyek ini, kita tidak menggunakan 'show' secara spesifik, jadi bisa dibiarkan kosong)
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Menampilkan form untuk mengedit data.
     */
    public function edit($id_anggota)
    {
        $anggotum = Anggota::findOrFail($id_anggota);
        return view('admin.anggota.edit', compact('anggotum'));
    }

    /**
     * Mengupdate data di database.
     */
    public function update(Request $request, $id_anggota)
    {
        $request->validate([
            'id_anggota' => 'required|integer|exists:anggota,id_anggota',
            'gelar_depan' => 'nullable|string|max:50',
            'nama_depan' => 'required|string|max:100',
            'nama_belakang' => 'required|string|max:100',
            'gelar_belakang' => 'nullable|string|max:50',
            'jabatan' => 'required|string',
            'status_pernikahan' => 'required|string',
            'jumlah_anak' => 'required|integer|min:0',
        ]);

        $anggotum = Anggota::findOrFail($id_anggota);
        $anggotum->update($request->all());

        return redirect()->route('admin.anggota.index')
                         ->with('success', 'Data Anggota berhasil diperbarui.');
    } // <-- INI KURUNG KURAWAL YANG KEMUNGKINAN HILANG

    /**
     * Menghapus data dari database.
     */
    public function destroy($id_anggota)
    {
        $anggotum = Anggota::findOrFail($id_anggota);
        $anggotum->delete();

        return redirect()->route('admin.anggota.index')
                         ->with('success', 'Data Anggota berhasil dihapus.');
    }
}