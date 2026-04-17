<?php

namespace App\Filament\Resources\Cittas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CittasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'città'    => 'success',
                        'frazione' => 'warning',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'città'    => 'Città',
                        'frazione' => 'Frazione',
                    })
                    ->sortable(),
                TextColumn::make('comune.name')
                    ->label('Comune')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('comune.provincia.name')
                    ->label('Provincia')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('comune.provincia.regione.name')
                    ->label('Regione')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('comune.provincia.regione.country.name')
                    ->label('Paese')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
