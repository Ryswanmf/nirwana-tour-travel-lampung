<?php

namespace App\Filament\Resources\TourPackages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TourPackagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Foto'),
                TextColumn::make('title')
                    ->label('Nama Paket')
                    ->searchable()
                    ->sortable()
                    ->limit(35),
                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'lampung' => 'info',
                        'nusantara' => 'success',
                        'edukasi' => 'warning',
                        'armada' => 'primary',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'lampung' => 'Wisata Lampung',
                        'nusantara' => 'Nusantara',
                        'edukasi' => 'Edukasi',
                        'armada' => 'Armada Bus',
                        default => ucfirst($state),
                    }),
                TextColumn::make('duration')
                    ->label('Durasi'),
                TextColumn::make('price')
                    ->label('Harga')
                    ->money('IDR', locale: 'id')
                    ->sortable(),
                IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean(),
                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options([
                        'lampung' => 'Wisata Lampung',
                        'nusantara' => 'Wisata Nusantara',
                        'edukasi' => 'Study Tour & Edukasi',
                        'armada' => 'Sewa Armada Bus',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
