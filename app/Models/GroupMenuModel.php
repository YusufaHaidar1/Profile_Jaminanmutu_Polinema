<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupMenuModel extends Model
{
    use HasFactory;

    protected $table = 'groups_menu';
    protected $primaryKey = 'id_group_menu';
    public $timestamps = false;

    protected $fillable = ['id_group', 'id_menu'];

    public function group(): BelongsTo{
        return $this->belongsTo(GroupModel::class, 'id_group', 'id_group');
    }

    public function menu(): BelongsTo{
        return $this->belongsTo(SidebarMenuModel::class, 'id_menu', 'id_menu');
    }
}
