<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Layanan')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('title')
                                ->label('Nama Layanan')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn ($set, ?string $state) => $set('slug', Str::slug($state))),
                            TextInput::make('slug')
                                ->label('URL Slug')
                                ->required()
                                ->unique(ignoreRecord: true),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('icon')
                                ->label('Icon (Heroicon name)')
                                ->placeholder('map-pin, academic-cap, briefcase, truck')
                                ->default('map-pin'),
                            TextInput::make('sort_order')
                                ->label('Urutan')
                                ->numeric()
                                ->default(0),
                        ]),
                        Textarea::make('short_description')
                            ->label('Deskripsi Singkat (Muncul di Beranda)')
                            ->rows(3)
                            ->required(),
                        Textarea::make('full_description')
                            ->label('Penjelasan Lengkap Layanan')
                            ->rows(5)
                            ->required(),
                        TextInput::make('whatsapp_text')
                            ->label('Teks Konsultasi WhatsApp')
                            ->placeholder('Halo Admin Nirwana Tour, saya ingin konsultasi mengenai...')
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->default(true),
                    ]),
            ]);
    }
}
