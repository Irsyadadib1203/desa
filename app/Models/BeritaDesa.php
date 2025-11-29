<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaDesa extends Model
{
    use HasFactory;

    protected $table = 'berita_desa';
    protected $primaryKey = 'id_berita_desa';

    public $timestamps = false; 

    protected $fillable = [
        'judul_berita',
        'isi_berita',
        'gambar',
        'tgl_rilis',
    ];                         
}
