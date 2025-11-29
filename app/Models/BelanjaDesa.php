<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BelanjaDesa extends Model
{
    use HasFactory;

    protected $table = 'belanja_desa';
    public $timestamps = false;
    protected $fillable = ['nama', 'jumlah', 'tahun_id'];

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }

    public function subBelanja()
    {
        return $this->hasMany(SubBelanjaDesa::class, 'belanja_desa_id');
    }
}
