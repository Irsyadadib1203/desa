<?php

namespace App\Http\Controllers;

use App\Models\BeritaDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaDesaController extends Controller
{
    public function index()
    {
        $beritas = BeritaDesa::all();
        return view('admin.berita_desa.berita', compact('beritas'));
    }

      public function create()
    {
        return view('admin.berita_desa.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_berita' => 'required|string|max:255',
            'isi_berita'   => 'required|string',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tgl_rilis'    => 'nullable|date',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('berita', 'public');
            $validated['gambar'] = $path;
        }

        BeritaDesa::create($validated);

        return redirect()->back()->with('success', 'Berita berhasil ditambahkan.');
    }

     public function edit($id)
    {
        $berita = BeritaDesa::findOrFail($id);
        return view('content.edit-berita', compact('berita'));
    }

     public function update(Request $request, $id)
    {
        $berita = BeritaDesa::findOrFail($id);

        $validated = $request->validate([
            'judul_berita' => 'required|string|max:255',
            'isi_berita'   => 'required|string',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tgl_rilis'    => 'nullable|date',
        ]);

        // Jika ada gambar baru, hapus yang lama dan upload yang baru
        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = BeritaDesa::findOrFail($id);

        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->back()->with('success', 'Berita berhasil dihapus.');
    }
}
