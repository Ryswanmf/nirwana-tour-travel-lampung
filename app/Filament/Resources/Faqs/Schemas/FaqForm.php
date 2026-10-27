<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Tanya Jawab')
                    ->schema([
                        TextInput::make('question')
                            ->label('Pertanyaan')
                            ->required()
                            ->placeholder('Contoh: Bagaimana cara memesan paket wisata?'),
                        Textarea::make('answer')
                            ->label('Jawaban')
                            ->rows(4)
                            ->required(),
                        Grid::make(2)->schema([
                            TextInput::make('sort_order')
                                ->label('Urutan')
                                ->numeric()
                                ->default(0),
                            Toggle::make('is_active')
                                ->label('Status Aktif')
                                ->default(true),
                        ]),
                    ]),
            ]);
    }
}
