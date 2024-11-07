<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupModel extends Model
{
    use HasFactory;

    protected $table = 'groups';
    protected $primaryKey = 'id_group';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];
}
