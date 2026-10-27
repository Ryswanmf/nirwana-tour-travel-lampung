<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Artikel / Berita')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('title')
                                ->label('Judul Artikel')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn ($set, ?string $state) => $set('slug', Str::slug($state))),
                            TextInput::make('slug')
                                ->label('URL Slug')
                                ->required()
                                ->unique(ignoreRecord: true),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('thumbnail')
                                ->label('URL Foto Sampul / Thumbnail')
                                ->placeholder('https://... atau path gambar'),
                            DatePicker::make('published_at')
                                ->label('Tanggal Tayang')
                                ->default(now()),
                        ]),
                        Textarea::make('excerpt')
                            ->label('Ringkasan Singkat')
                            ->rows(3),
                        RichEditor::make('content')
                            ->label('Isi Konten Artikel')
                            ->required(),
                        Toggle::make('is_published')
                            ->label('Publikasikan')
                            ->default(true),
                    ]),
            ]);
    }
}
