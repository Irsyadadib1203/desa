<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
     public function Home(Request $request)
    {
        return view('index');
    }

     public function Profile(Request $request)
    {
        return view('pages.profile');
    }

    public function Berita(Request $request)
    {
        return view('pages.berita');
    }

    public function DetailBerita(Request $request)
    {
        return view('pages.detail-berita');
    }

     public function Infografis(Request $request)
    {
        return view('');
    }

    public function Penduduk(Request $request)
    {
        return view('pages.infografis.penduduk');
    }

    public function Bansos(Request $request)
    {
        return view('pages.infografis.bansos');
    }

    public function IDM(Request $request)
    {
        return view('pages.infografis.idm');
    }

    public function Stunting(Request $request)
    {
        return view('pages.infografis.stunting');
    }

    public function APBD(Request $request)
    {
        return view('pages.infografis.apbdes');
    }

     public function Lembaga(Request $request)
    {
        return view('');
    }

    public function RT(Request $request)
    {
        return view('pages.lembaga.rt');
    }

    public function Bumdes(Request $request)
    {
        return view('pages.lembaga.bumdes');
    }

    public function KarangTaruna(Request $request)
    {
        return view('pages.lembaga.karang-taruna');
    }

    public function Koperasi(Request $request)
    {
        return view('pages.lembaga.koperasi');
    }

    public function PKK(Request $request)
    {
        return view('pages.lembaga.pkk');
    }

     public function PPID(Request $request)
    {
        return view('');
    }

    public function VisiMisi(Request $request)
    {
        return view('pages.ppid.visi-misi');
    }

    public function Tugas(Request $request)
    {
        return view('pages.ppid.tugas');
    }

    public function Struktur(Request $request)
    {
        return view('pages.ppid.struktur');
    }

    public function Pelayanan(Request $request)
    {
        return view('pages.ppid.pelayanan');
    }
}
