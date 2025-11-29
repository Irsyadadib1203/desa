<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sotk extends Model
{
     use HasFactory;

    protected $table = 'sotk';
    protected $primaryKey = 'id_sotk';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'gambar',
        'jabatan',
    ];
}
