<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    // ✅ Menampilkan semua pengguna
    public function index()
    {
        $pengguna = Pengguna::all();
        return view('superadmin.pengguna.pengguna', compact('pengguna'));
    }

    // ✅ Menampilkan form tambah pengguna
    public function create()
    {
        return view('superadminpengguna.tambah');
    }

    // ✅ Simpan data pengguna baru
    public function store(Request $request)
    {
        $request->validate([
            'nm_pengguna' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:pengguna,username',
            'password' => 'required|string|min:6',
            'role' => 'required|in:superadmin,admin',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        Pengguna::create([
            'nm_pengguna' => $request->nm_pengguna,
            'username' => $request->username,
            'password' => $request->password,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    // ✅ Menampilkan form edit pengguna
    public function edit($id_pengguna)
    {
        $pengguna = Pengguna::findOrFail($id_pengguna);
        return view('superadmin.pengguna.edit', compact('pengguna'));
    }

    // ✅ Update data pengguna
    public function update(Request $request, $id_pengguna)
    {
        $pengguna = Pengguna::findOrFail($id_pengguna);

        $request->validate([
            'nm_pengguna' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:pengguna,username,' . $pengguna->id_pengguna . ',id_pengguna',
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:superadmin,admin',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $data = $request->only(['nm_pengguna', 'username', 'role', 'status']);

        // Update password jika diisi
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $pengguna->update($data);

        return redirect()->route('pengguna')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    // ✅ Hapus pengguna
    public function destroy($id_pengguna)
    {
        $pengguna = Pengguna::findOrFail($id_pengguna);
        $pengguna->delete();

        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }
}
