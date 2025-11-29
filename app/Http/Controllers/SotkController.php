<?php

namespace App\Http\Controllers;

use App\Models\Sotk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SotkController extends Controller
{
    public function index()
    {
        $sotk = Sotk::all();
        return view('admin.sotk.sotk', compact('sotk'));
    }

    public function create()
    {
        return view('admin.sotk.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:45',
            'jabatan' => 'required|string|max:20',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('sotk', 'public');
            $validated['gambar'] = $path;
        }

        Sotk::create($validated);

        return redirect()->route('sotk')->with('success', 'Data SOTK berhasil ditambahkan.');
    }

    public function edit($id_sotk)
    {
        $sotk = Sotk::findOrFail($id_sotk);
        return view('admin.sotk.edit', compact('sotk'));
    }

    public function update(Request $request, $id_sotk)
    {
        $sotk = Sotk::findOrFail($id_sotk);

        $validated = $request->validate([
            'nama' => 'required|string|max:45',
            'jabatan' => 'required|string|max:20',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update gambar jika ada yang baru
        if ($request->hasFile('gambar')) {
            if ($sotk->gambar && Storage::disk('public')->exists($sotk->gambar)) {
                Storage::disk('public')->delete($sotk->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('sotk', 'public');
        }

        $sotk->update($validated);

        return redirect()->route('sotk')->with('success', 'Data SOTK berhasil diperbarui.');
    }

    public function destroy($id_sotk)
    {
        $sotk = Sotk::findOrFail($id_sotk);

        if ($sotk->gambar && Storage::disk('public')->exists($sotk->gambar)) {
            Storage::disk('public')->delete($sotk->gambar);
        }

        $sotk->delete();

        return redirect()->back()->with('success', 'Data SOTK berhasil dihapus.');
    }
}
