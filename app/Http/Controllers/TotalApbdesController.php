<?php

// app/Http/Controllers/TotalApbdesController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BelanjaDesa;
use App\Models\PendapatanPembiayaan;
use App\Models\Tahun;

class TotalApbdesController extends Controller
{
    public function index(Request $request)
    {
        $tahunFilter = $request->tahun_id;
        $tahun = Tahun::orderBy('tahun', 'desc')->get();

        $data = null;

        if ($tahunFilter) {
            $belanjaTotal = BelanjaDesa::where('tahun_id', $tahunFilter)->sum('jumlah');
            $pendapatanTotal = PendapatanPembiayaan::where('tahun_id', $tahunFilter)
                ->where('jenis', 'pendapatan')
                ->sum('jumlah');
            $pembiayaanTotal = PendapatanPembiayaan::where('tahun_id', $tahunFilter)
                ->where('jenis', 'pembiayaan')
                ->sum('jumlah');

            $surplus = $pendapatanTotal - $belanjaTotal;

            $data = [
                'belanja' => $belanjaTotal,
                'pendapatan' => $pendapatanTotal,
                'pembiayaan' => $pembiayaanTotal,
                'surplus' => $surplus
            ];
        }

        return view('admin.infografis.apbdes.totalApbdes', compact('tahun', 'tahunFilter', 'data'));
    }
}

