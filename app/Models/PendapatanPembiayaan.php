<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendapatanPembiayaan extends Model
{
    protected $table = 'pendapatan_pembiayaan';
    public $timestamps = false;
    protected $fillable = ['nama', 'jumlah', 'jenis', 'tahun_id'];

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }
}
