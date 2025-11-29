<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BelanjaDesa;
use App\Models\SubBelanjaDesa;
use App\Models\Tahun;
use Illuminate\Support\Facades\DB;

class BelanjaController extends Controller
{
    public function index(Request $request)
    {
        $tahunFilter = $request->tahun_id;
        $tahun = Tahun::orderBy('tahun', 'desc')->get();

        $belanja = BelanjaDesa::with(['tahun', 'subBelanja'])
            ->when($tahunFilter, fn($q) => $q->where('tahun_id', $tahunFilter))
            ->get();

        return view('admin.infografis.apbdes.belanja', compact('belanja', 'tahun', 'tahunFilter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'tahun' => 'required|digits:4'
        ]);

        $tahun = Tahun::firstOrCreate(['tahun' => $request->tahun]);

        BelanjaDesa::create([
            'nama' => $request->nama,
            'jumlah' => 0,
            'tahun_id' => $tahun->id,
        ]);

        return back()->with('success', 'Menu belanja berhasil ditambahkan.');
    }

    public function storeSub(Request $request)
    {
        $request->validate([
            'belanja_desa_id' => 'required|exists:belanja_desa,id',
            'nama' => 'required|string|max:80',
            'jumlah' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            $sub = SubBelanjaDesa::create([
                'belanja_desa_id' => $request->belanja_desa_id,
                'nama' => $request->nama,
                'jumlah' => $request->jumlah,
            ]);

            // update total jumlah di menu utama
            $belanja = BelanjaDesa::find($request->belanja_desa_id);
            $belanja->increment('jumlah', $request->jumlah);
        });

        return back()->with('success', 'Sub belanja berhasil ditambahkan dan total diperbarui.');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nama' => 'required|string|max:100']);
        $belanja = BelanjaDesa::findOrFail($id);
        $belanja->update(['nama' => $request->nama]);

        return back()->with('success', 'Menu berhasil diperbarui.');
    }

    public function updateSub(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:80',
            'jumlah' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request, $id) {
            $sub = SubBelanjaDesa::findOrFail($id);
            $belanja = $sub->belanja; // Pastikan relasi bernama 'belanja'

            // hitung selisih
            $selisih = $request->jumlah - $sub->jumlah;

            // update sub menu
            $sub->update([
                'nama' => $request->nama,
                'jumlah' => $request->jumlah,
            ]);

            // update total menu utama
            $belanja->increment('jumlah', $selisih);
        });

        return back()->with('success', 'Sub menu berhasil diperbarui dan total diperbarui.');
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $belanja = BelanjaDesa::with('subBelanja')->findOrFail($id);

            // hapus semua sub menu
            $belanja->subBelanja()->delete();

            // hapus menu utama
            $belanja->delete();
        });

        return back()->with('success', 'Menu dan semua sub menu berhasil dihapus.');
    }

    public function destroySub($id)
    {
        DB::transaction(function () use ($id) {
            $sub = SubBelanjaDesa::findOrFail($id);
            $belanja = $sub->belanja; // gunakan relasi 'belanja'
            $belanja->decrement('jumlah', $sub->jumlah);
            $sub->delete();
        });

        return back()->with('success', 'Sub belanja dihapus dan total diperbarui.');
    }
}
