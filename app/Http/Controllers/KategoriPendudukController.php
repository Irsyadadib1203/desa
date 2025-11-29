<?php

namespace App\Http\Controllers;

use App\Models\DataKategoriPenduduk;
use App\Models\KategoriPenduduk;
use Illuminate\Http\Request;

class KategoriPendudukController extends Controller
{
    public function penduduk()
    {
        $kategori = KategoriPenduduk::all();
        $dataKategori = DataKategoriPenduduk::with('kategori')->get();
        return view('admin.infografis.penduduk.jumlahPenduduk', compact('kategori', 'dataKategori'));
    }

    public function perkawinan()
    {
        $kategori = KategoriPenduduk::all();
        $dataKategori = DataKategoriPenduduk::with('kategori')->get();
        return view('admin.infografis.penduduk.perkawinan', compact('kategori', 'dataKategori'));
    }

        public function pendidikan()
    {
        $kategori = KategoriPenduduk::all();
        $dataKategori = DataKategoriPenduduk::with('kategori')->get();
        return view('admin.infografis.penduduk.pendidikan', compact('kategori', 'dataKategori'));
    }

        public function pekerjaan()
    {
        $kategori = KategoriPenduduk::all();
        $dataKategori = DataKategoriPenduduk::with('kategori')->get();
        return view('admin.infografis.penduduk.pekerjaan', compact('kategori', 'dataKategori'));
    }

        public function agama()
    {
        $kategori = KategoriPenduduk::all();
        $dataKategori = DataKategoriPenduduk::with('kategori')->get();
        return view('admin.infografis.penduduk.agama', compact('kategori', 'dataKategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|integer',
            'kategori_penduduk_id_kategori' => 'required|exists:kategori_penduduk,id_kategori'
        ]);

        DataKategoriPenduduk::create($request->all());
        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|integer',
        ]);

        $data = DataKategoriPenduduk::findOrFail($id);
        $data->update($request->all());
        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = DataKategoriPenduduk::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
