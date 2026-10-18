<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = 'curricula';

    protected $fillable = [
        'kode',
        'nama',
        'sks',
        'semester',
        'konsentrasi',
        'sifat',
        'deskripsi',
    ];

    protected $casts = [
        'sks' => 'integer',
        'semester' => 'integer',
    ];
}
