<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GaleriDesa;

class GaleriDesaController extends Controller
{
    public function Galeri()
    {
        $data = GaleriDesa::where('status', 'publish')->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
}
