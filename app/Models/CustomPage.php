<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'meta_description',
        'show_in_navbar',
        'is_active',
    ];

    protected $casts = [
        'show_in_navbar' => 'boolean',
        'is_active' => 'boolean',
    ];
}
