<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use App\Models\Pengurus;
use App\Models\Anggota;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    public function index(Request $request)
    {
        $lembagas = Lembaga::all();
        $selected = $request->lembaga_id;

        $lembaga = null;
        $pengurus = [];
        $anggota = [];

        if ($selected) {
            $lembaga = Lembaga::with(['pengurus', 'anggota'])->find($selected);
            $pengurus = $lembaga->pengurus ?? [];
            $anggota = $lembaga->anggota ?? [];
        }

        return view('admin.lembaga.lembaga', compact('lembagas', 'lembaga', 'pengurus', 'anggota', 'selected'));
    }

    // === CRUD LEMBAGA ===
    public function storeLembaga(Request $request)
    {
        
        $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'kategori' => 'required',
            'no_sk' => 'nullable',
            'keterangan' => 'nullable',
        ]);

        Lembaga::create($request->all());
        return back()->with('success', 'Lembaga berhasil ditambahkan!');
    }

    public function updateLembaga(Request $request, $id)
    {
        $lembaga = Lembaga::findOrFail($id);
        $lembaga->update($request->all());
        return back()->with('success', 'Lembaga berhasil diperbarui!');
    }

    public function deleteLembaga($id)
    {
        Lembaga::destroy($id);
        return back()->with('success', 'Lembaga berhasil dihapus!');
    }

    // === CRUD PENGURUS ===
    public function storePengurus(Request $request)
    {
        $request->validate([
            'lembaga_id' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
        ]);

        Pengurus::create($request->all());
        return back()->with('success', 'Pengurus berhasil ditambahkan!');
    }

    public function updatePengurus(Request $request, $id)
    {
        $pengurus = Pengurus::findOrFail($id);
        $pengurus->update($request->all());
        return back()->with('success', 'Pengurus berhasil diperbarui!');
    }

    public function deletePengurus($id)
    {
        Pengurus::destroy($id);
        return back()->with('success', 'Pengurus berhasil dihapus!');
    }

    // === CRUD ANGGOTA ===
    public function storeAnggota(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'lembaga_id' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        Anggota::create($request->all());
        return back()->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function updateAnggota(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->all());
        return back()->with('success', 'Anggota berhasil diperbarui!');
    }

    public function deleteAnggota($id)
    {
        Anggota::destroy($id);
        return back()->with('success', 'Anggota berhasil dihapus!');
    }
}
