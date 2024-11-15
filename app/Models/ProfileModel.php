<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    use HasFactory;

    protected $table = 'profile';
    protected $primaryKey = 'id_profile';
    public $timestamps = false;

    protected $fillable = [
        'gambar',
        'gambar_eng',
        'judul',
        'judul_eng',
        'deskripsi',
        'deskripsi_eng',

    ];
}
