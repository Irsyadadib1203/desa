<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bansos;

class BansosController extends Controller
{
    public function index()
    {
        $dataBansos = Bansos::all();
        return view('admin.infografis.bansos.bansos', compact('dataBansos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_bansos' => 'required',
            'jumlah' => 'required|integer'
        ]);

        Bansos::create($request->all());
        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nm_bansos' => 'required',
            'jumlah' => 'required|integer',
        ]);

        $data = Bansos::findOrFail($id);
        $data->update([
            'nm_bansos' => $request->nm_bansos,
            'jumlah' => $request->jumlah,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Bansos::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
