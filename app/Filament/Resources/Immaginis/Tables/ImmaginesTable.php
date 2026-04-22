<?php

namespace App\Filament\Resources\Immaginis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ImmaginesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('path')
                    ->label('Anteprima')
                    ->disk('public')
                    ->height(60)
                    ->width(80),

                TextColumn::make('nome')
                    ->label('Nome')
                    ->default('—')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Caricata il')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([])
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
