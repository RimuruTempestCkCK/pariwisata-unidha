<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileItem extends Model
{
    protected $fillable = [
        'kategori',
        'label',
        'isi',
        'keterangan',
        'foto',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];
}
