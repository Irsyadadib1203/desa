<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BeritaDesa;

class BeritaDesaController extends Controller
{
    public function Berita()
    {
        $data = BeritaDesa::all();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function getBerita($id)
    {
        $berita = BeritaDesa::find($id);
        if (!$berita) {
            return response()->json([
                'status' => 'error',
                'message' => 'Berita tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $berita
        ]);
    }
}
