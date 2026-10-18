<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'author',
        'date_text',
        'image',
        'summary',
        'content',
        'tags',
        'is_published',
    ];

    protected $casts = [
        'content' => 'array',
        'tags' => 'array',
        'is_published' => 'boolean',
    ];
}
