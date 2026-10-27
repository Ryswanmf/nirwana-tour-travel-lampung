<?php

namespace App\Filament\Resources\CustomPages\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CustomPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Halaman Kustom Dinamis')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('title')
                                ->label('Judul Halaman')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn ($set, ?string $state) => $set('slug', Str::slug($state))),
                            TextInput::make('slug')
                                ->label('URL Slug (Akan diakses di /halaman/{slug})')
                                ->required()
                                ->unique(ignoreRecord: true),
                        ]),
                        Textarea::make('meta_description')
                            ->label('Deskripsi Meta (SEO)')
                            ->rows(2),
                        RichEditor::make('content')
                            ->label('Konten Halaman')
                            ->required(),
                        Grid::make(2)->schema([
                            Toggle::make('show_in_navbar')
                                ->label('Tampilkan di Menu Navigasi Website')
                                ->default(false),
                            Toggle::make('is_active')
                                ->label('Status Aktif')
                                ->default(true),
                        ]),
                    ]),
            ]);
    }
}
