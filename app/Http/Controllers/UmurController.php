<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataUmur;

class UmurController extends Controller
{
    public function index()
    {
        $dataUmur = DataUmur::all();
        return view('admin.infografis.penduduk.umur', compact('dataUmur'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'umur' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'jumlah' => 'required|integer'
        ]);

        DataUmur::create($request->all());
        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'umur' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'jumlah' => 'required|integer',
        ]);

        $data = DataUmur::findOrFail($id);
        $data->update([
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jumlah' => $request->jumlah,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = DataUmur::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
