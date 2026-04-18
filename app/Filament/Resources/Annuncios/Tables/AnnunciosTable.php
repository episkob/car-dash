<?php

namespace App\Filament\Resources\Annuncios\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AnnunciosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titolo')
                    ->label('Titolo')
                    ->searchable()
                    ->sortable()
                    ->limit(60),
                TextColumn::make('citta.name')
                    ->label('Città')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('citta.comune.provincia.name')
                    ->label('Provincia')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Creato il')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Aggiornato il')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
