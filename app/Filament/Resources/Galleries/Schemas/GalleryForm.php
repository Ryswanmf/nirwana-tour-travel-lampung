<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Foto Dokumentasi')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Dokumentasi')
                            ->required(),
                        Grid::make(2)->schema([
                            TextInput::make('client_name')
                                ->label('Nama Klien / Rombongan')
                                ->placeholder('Contoh: PT PLN Persero / SMAN 2'),
                            TextInput::make('category')
                                ->label('Kategori Kegiatan')
                                ->placeholder('Contoh: Study Tour, Gathering, Dinas')
                                ->default('Dokumentasi Trip'),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('image_path')
                                ->label('URL Gambar / Foto')
                                ->required()
                                ->placeholder('https://... atau path gambar'),
                            DatePicker::make('trip_date')
                                ->label('Tanggal Perjalanan'),
                        ]),
                        Textarea::make('caption')
                            ->label('Keterangan / Cerita Singkat')
                            ->rows(3),
                        Toggle::make('is_active')
                            ->label('Tampilkan di Galeri')
                            ->default(true),
                    ]),
            ]);
    }
}
