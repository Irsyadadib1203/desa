<?php

// app/Http/Controllers/PendapatanPembiayaanController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendapatanPembiayaan;
use App\Models\Tahun;

class PendapatanPembiayaanController extends Controller
{
    public function index(Request $request, $jenis)
    {
        $tahunFilter = $request->tahun_id;
        $tahun = Tahun::orderBy('tahun', 'desc')->get();

        $data = PendapatanPembiayaan::where('jenis', $jenis)
            ->when($tahunFilter, fn($q) => $q->where('tahun_id', $tahunFilter))
            ->with('tahun')
            ->get();

        if ($jenis === 'pendapatan') {
            return view('admin.infografis.apbdes.pendapatan', compact('data', 'tahun', 'tahunFilter', 'jenis'));
        } else {
            return view('admin.infografis.apbdes.pembiayaan', compact('data', 'tahun', 'tahunFilter', 'jenis'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:80',
            'jumlah' => 'required|numeric|min:0',
            'tahun' => 'required|digits:4',
            'jenis' => 'required|in:pendapatan,pembiayaan'
        ]);

        $tahun = Tahun::firstOrCreate(['tahun' => $request->tahun]);

        PendapatanPembiayaan::create([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'tahun_id' => $tahun->id,
            'jenis' => $request->jenis
        ]);

        return back()->with('success', ucfirst($request->jenis).' berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:80',
            'jumlah' => 'required|numeric|min:0',
        ]);

        $data = PendapatanPembiayaan::findOrFail($id);
        $data->update([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah
        ]);

        return back()->with('success', ucfirst($data->jenis).' berhasil diperbarui.');
    }

    public function destroy($id)
    {
        PendapatanPembiayaan::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
