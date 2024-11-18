<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfiledetailModel extends Model
{
    use HasFactory;

    protected $table = 'profile_detail';
    protected $primaryKey = 'id_detail_profile';
    public $timestamps = false;

    protected $fillable = [
        'jenis',
        'jenis_eng',
        'detail_profile',
        'detail_profile_eng',

    ];
    public function group(): BelongsTo
    {
        return $this->belongsTo(ProfileModel::class, 'id_profile', 'id_profile');
    }
}
