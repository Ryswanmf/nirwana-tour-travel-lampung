<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identitas Perusahaan')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('company_name')
                                ->label('Nama Perusahaan')
                                ->required(),
                            TextInput::make('tagline')
                                ->label('Slogan / Tagline')
                                ->required(),
                        ]),
                    ]),

                Section::make('Profil Pimpinan (Kiki M Alfin)')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('owner_name')
                                ->label('Nama Pimpinan')
                                ->required(),
                            TextInput::make('owner_title')
                                ->label('Jabatan Pimpinan')
                                ->required(),
                        ]),
                        TextInput::make('owner_photo')
                            ->label('URL Foto Resmi Pimpinan')
                            ->placeholder('https://... atau path gambar'),
                        Textarea::make('owner_greeting')
                            ->label('Kutipan Sambutan Hangat Pimpinan')
                            ->rows(4)
                            ->required(),
                    ]),

                Section::make('Statistik & Angka Pencapaian')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('years_experience')
                                ->label('Pengalaman')
                                ->default('8+ Tahun'),
                            TextInput::make('total_trips')
                                ->label('Total Trip Terlaksana')
                                ->default('1.500+ Trip'),
                            TextInput::make('satisfaction_rate')
                                ->label('Tingkat Kepuasan')
                                ->default('99% Kepuasan'),
                        ]),
                    ]),

                Section::make('Kontak & Media Sosial')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('whatsapp_number')
                                ->label('Nomor WhatsApp Admin (Awali 62)')
                                ->required()
                                ->helperText('Format: 6282177889900 (tanpa tanda + atau spasi)'),
                            TextInput::make('email')
                                ->label('Alamat Email')
                                ->email(),
                        ]),
                        Textarea::make('address')
                            ->label('Alamat Lengkap Kantor')
                            ->rows(3),
                        Textarea::make('google_maps_embed')
                            ->label('Kode Embed Iframe Google Maps')
                            ->rows(3),
                        Grid::make(2)->schema([
                            TextInput::make('instagram_url')
                                ->label('URL Instagram'),
                            TextInput::make('facebook_url')
                                ->label('URL Facebook'),
                        ]),
                    ]),
            ]);
    }
}
