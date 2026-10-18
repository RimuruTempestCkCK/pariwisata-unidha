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
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];
}
