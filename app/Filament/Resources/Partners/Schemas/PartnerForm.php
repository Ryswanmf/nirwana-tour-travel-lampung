<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Mitra Rekanan')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Mitra / Instansi')
                            ->required()
                            ->placeholder('Contoh: PT PLN (Persero) UID Lampung'),
                        Grid::make(3)->schema([
                            Select::make('category')
                                ->label('Kategori')
                                ->options([
                                    'BUMN' => 'BUMN / BUMD',
                                    'Instansi' => 'Instansi Pemerintah',
                                    'Sekolah' => 'Sekolah',
                                    'Universitas' => 'Universitas / Perguruan Tinggi',
                                    'Swasta' => 'Perusahaan Swasta',
                                ])
                                ->default('Instansi')
                                ->required(),
                            TextInput::make('sort_order')
                                ->label('Urutan Tampil')
                                ->numeric()
                                ->default(0),
                            Toggle::make('is_active')
                                ->label('Status Aktif')
                                ->default(true),
                        ]),
                        TextInput::make('logo_path')
                            ->label('URL Logo (Opsional)')
                            ->placeholder('https://... atau biarkan kosong'),
                    ]),
            ]);
    }
}
