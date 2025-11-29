<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBelanjaDesa extends Model
{
    use HasFactory;

    protected $table = 'sub_belanja_desa';
    protected $fillable = ['belanja_desa_id', 'nama', 'jumlah'];
    public $timestamps = false;

    public function belanja()
    {
        return $this->belongsTo(BelanjaDesa::class, 'belanja_desa_id');
    }
}
