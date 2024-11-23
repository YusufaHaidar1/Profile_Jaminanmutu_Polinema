<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpmiModel extends Model
{
    use HasFactory;

    protected $table = 'spmi';
    protected $primaryKey = 'id_spmi';
    public $timestamps = false;

    protected $fillable = [
        'spmi',
        'file',
        
    ];
}
