<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKategoriPenduduk extends Model
{
    use HasFactory;

    protected $table = 'data_kategori_penduduk';
    protected $primaryKey = 'id_data';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'jumlah',
        'kategori_penduduk_id_kategori'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriPenduduk::class, 'kategori_penduduk_id_kategori');
    }
}
