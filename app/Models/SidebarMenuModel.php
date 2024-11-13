<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SidebarMenuModel extends Model
{
    use HasFactory;

    protected $table = 'sidebar_menu';
    protected $primaryKey = 'id_menu';
    public $timestamps = false;

    protected $fillable = [
        'level',
        'parent_id',
        'label',
        'link',
    ];  

}
