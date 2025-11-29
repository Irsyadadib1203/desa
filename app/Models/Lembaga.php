<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Lembaga extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'lembaga';
    protected $fillable = ['nama', 'kode', 'kategori', 'no_sk', 'keterangan'];

    public function pengurus()
    {
        return $this->hasMany(Pengurus::class, 'lembaga_id');
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'lembaga_id');
    }
}
