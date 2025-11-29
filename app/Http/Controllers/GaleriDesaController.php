<?php

namespace App\Http\Controllers;

use App\Models\GaleriDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriDesaController extends Controller
{
    // Menampilkan halaman utama galeri (list + modal)
    public function index()
    {
        $galeris = GaleriDesa::orderBy('id_galeri', 'desc')->get();
        return view('admin.galeri_desa.galeri', compact('galeris'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:150',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tgl_upload' => 'required|date',
            'status' => 'required|in:draft,publish',
        ]);

        // Simpan file ke storage
        $path = $request->file('gambar')->store('galeri', 'public');

        GaleriDesa::create([
            'judul' => $validated['judul'],
            'gambar' => $path,
            'tgl_upload' => $validated['tgl_upload'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('galeri')->with('success', 'Galeri berhasil ditambahkan!');
    }

    // Update data
    public function update(Request $request, $id)
    {
        $galeri = GaleriDesa::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:150',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tgl_upload' => 'required|date',
            'status' => 'required|in:draft,publish',
        ]);

        // Jika ada gambar baru, hapus yang lama
        if ($request->hasFile('gambar')) {
            if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
                Storage::disk('public')->delete($galeri->gambar);
            }
            $path = $request->file('gambar')->store('galeri', 'public');
            $galeri->gambar = $path;
        }

        $galeri->update([
            'judul' => $validated['judul'],
            'tgl_upload' => $validated['tgl_upload'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('galeri')->with('success', 'Galeri berhasil diperbarui!');
    }

    // Hapus data
    public function destroy($id)
    {
        $galeri = GaleriDesa::findOrFail($id);

        // Hapus file gambar dari storage
        if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();

        return redirect()->route('galeri')->with('success', 'Galeri berhasil dihapus!');
    }
}
