<?php

namespace App\Filament\Resources\TourPackages\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TourPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Dasar Paket')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('title')
                                ->label('Nama Paket Wisata')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn ($set, ?string $state) => $set('slug', Str::slug($state))),
                            TextInput::make('slug')
                                ->label('URL Slug')
                                ->required()
                                ->unique(ignoreRecord: true),
                        ]),
                        Grid::make(3)->schema([
                            Select::make('category')
                                ->label('Kategori')
                                ->options([
                                    'lampung' => 'Wisata Lampung',
                                    'nusantara' => 'Wisata Nusantara',
                                    'edukasi' => 'Study Tour & Edukasi',
                                    'armada' => 'Sewa Armada Bus',
                                ])
                                ->required()
                                ->default('lampung'),
                            TextInput::make('duration')
                                ->label('Durasi Perjalanan')
                                ->placeholder('Contoh: 3 Hari 2 Malam')
                                ->required(),
                            TextInput::make('price')
                                ->label('Harga Paket')
                                ->numeric()
                                ->prefix('Rp')
                                ->required()
                                ->default(0),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('price_unit')
                                ->label('Satuan Harga')
                                ->default('/ Orang')
                                ->required(),
                            TextInput::make('thumbnail')
                                ->label('URL Gambar / Foto Utama')
                                ->placeholder('https://... atau path foto')
                                ->helperText('Dapat menggunakan link gambar langsung atau path storage'),
                        ]),
                        Textarea::make('description')
                            ->label('Deskripsi Singkat Paket')
                            ->rows(3),
                    ]),

                Section::make('Fasilitas Paket')
                    ->schema([
                        TagsInput::make('includes')
                            ->label('Fasilitas Termasuk (Include)')
                            ->placeholder('Ketik fasilitas lalu tekan Enter')
                            ->helperText('Contoh: Transportasi AC, Hotel Bintang 3, Makan Prasmanan'),
                        TagsInput::make('excludes')
                            ->label('Fasilitas Tidak Termasuk (Exclude)')
                            ->placeholder('Ketik fasilitas lalu tekan Enter')
                            ->helperText('Contoh: Belanja Pribadi, Tips Driver, Tiket Pesawat PP'),
                    ]),

                Section::make('Rundown / Itinerary Harian')
                    ->schema([
                        Repeater::make('itineraries')
                            ->label('Jadwal Harian')
                            ->schema([
                                TextInput::make('day')
                                    ->label('Hari Ke-')
                                    ->numeric()
                                    ->required()
                                    ->default(1),
                                TextInput::make('title')
                                    ->label('Judul / Rute Hari Ini')
                                    ->required()
                                    ->placeholder('Contoh: Penjemputan di Bandara & Snorkeling Pulau Pahawang'),
                                Textarea::make('activities')
                                    ->label('Rincian Aktivitas')
                                    ->required()
                                    ->rows(3)
                                    ->placeholder('Tuliskan rincian jadwal kegiatan hari ini...'),
                            ])
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => isset($state['day']) ? "Hari ke-{$state['day']}: " . ($state['title'] ?? '') : null)
                            ->defaultItems(1),
                    ]),

                Section::make('Status & Visibilitas')
                    ->schema([
                        Grid::make(2)->schema([
                            Toggle::make('is_featured')
                                ->label('Tampilkan di Beranda (Paket Unggulan)')
                                ->default(false),
                            Toggle::make('is_active')
                                ->label('Status Aktif (Tampil di Website)')
                                ->default(true),
                        ]),
                    ]),
            ]);
    }
}
