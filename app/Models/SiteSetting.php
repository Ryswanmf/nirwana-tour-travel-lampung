<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'tagline',
        'owner_name',
        'owner_title',
        'owner_photo',
        'owner_greeting',
        'whatsapp_number',
        'email',
        'address',
        'google_maps_embed',
        'instagram_url',
        'facebook_url',
        'years_experience',
        'total_trips',
        'satisfaction_rate',
    ];

    public static function getSetting()
    {
        return static::first() ?? static::create([
            'company_name' => 'Nirwana Tour Lampung',
            'tagline' => 'Jelajahi Dunia, Ciptakan Cerita Tak Terlupakan',
            'owner_name' => 'Kiki M Alfin',
            'owner_title' => 'Pimpinan & Founder',
            'owner_greeting' => 'Selamat datang di Nirwana Tour Lampung. Kami berkomitmen memberikan pengalaman perjalanan wisata, edukasi, dan dinas terbaik dengan layanan profesional, aman, dan berkesan.',
            'whatsapp_number' => '6281273934567',
            'email' => 'info@nirwanatourlampung.com',
            'address' => 'Jl. ZA. Pagar Alam No. 88, Gedong Meneng, Rajabasa, Kota Bandar Lampung, Lampung 35145',
            'years_experience' => '8+',
            'total_trips' => '1.500+',
            'satisfaction_rate' => '99%',
        ]);
    }
}
