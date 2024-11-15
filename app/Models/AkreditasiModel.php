<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkreditasiModel extends Model
{
    use HasFactory;

    protected $table = 'akreditasi';
    protected $primaryKey = 'id_akreditasi';
    public $timestamps = false;

    protected $fillable = [
        'jenjang',
        'sk',
        'nama',
        'nama_eng',
        'skor',
        'masa_berlaku_dari',
        'masa_berlaku_sampai',
        'dokumen'
    ];
}
