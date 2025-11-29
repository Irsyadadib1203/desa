<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPenduduk extends Model
{
    use HasFactory;

    protected $table = 'kategori_penduduk';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;

    protected $fillable = [
        'nm_kategori'
    ];

    public function dataKategori()
    {
        return $this->hasMany(DataKategoriPenduduk::class, 'kategori_penduduk_id_kategori');
    }
}
