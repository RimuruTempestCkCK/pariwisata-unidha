<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingElement extends Model
{
    protected $fillable = [
        'seksi',
        'parameter',
        'konten',
        'cta_text',
        'cta_link',
        'status',
    ];
}
