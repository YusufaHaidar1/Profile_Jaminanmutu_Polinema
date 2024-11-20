<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerandaModel extends Model
{
    use HasFactory;

    protected $table = 'beranda';
    protected $primaryKey = 'id_beranda';
    public $timestamps = false;

    protected $fillable = [
        'id_berita',
        'judul',
        'judul_eng',
        'deskripsi',
        'deskripsi_eng',

    ];
}
