<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    public $timestamps = false;
    protected $fillable = ['id', 'nama', 'alamat', 'jenis_kelamin', 'lembaga_id'];
    public $incrementing = false; // agar ID diinput manual

    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class, 'lembaga_id');
    }
}
