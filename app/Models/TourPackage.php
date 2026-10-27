<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'duration',
        'price',
        'price_unit',
        'thumbnail',
        'description',
        'includes',
        'excludes',
        'itineraries',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'includes' => 'array',
        'excludes' => 'array',
        'itineraries' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'integer',
    ];

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getCategoryLabelAttribute(): string
    {
        return match ($this->category) {
            'lampung' => 'Wisata Lampung',
            'nusantara' => 'Wisata Nusantara',
            'edukasi' => 'Study Tour & Edukasi',
            'armada' => 'Sewa Armada Bus',
            default => ucfirst($this->category),
        };
    }
}
