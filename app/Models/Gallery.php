<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'client_name',
        'category',
        'image_path',
        'trip_date',
        'caption',
        'is_active',
    ];

    protected $casts = [
        'trip_date' => 'date',
        'is_active' => 'boolean',
    ];
}
