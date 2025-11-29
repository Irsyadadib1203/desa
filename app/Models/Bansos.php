<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bansos extends Model
{
    
    use HasFactory;
    protected $table = 'bansos';
    
    protected $primaryKey = 'id_bansos'; 
    public $id = 'id_bansos';
    public $timestamps = false;
    protected $fillable = ['id_bansos', 'nm_bansos', 'jumlah'];
}
