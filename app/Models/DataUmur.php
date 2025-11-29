<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataUmur extends Model
{
    use HasFactory;

    protected $table = 'umur';
    protected $primaryKey = 'id_umur';

    public $id = 'id_umur';

    public $timestamps = false; 

    protected $fillable = [
        'umur',
        'jenis_kelamin',
        'jumlah',
    ];             
}
