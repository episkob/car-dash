<?php

namespace App\Filament\Resources\Cittas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CittaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('comune.provincia.regione.country.name')->label('Paese'),
                TextEntry::make('comune.provincia.regione.name')->label('Regione'),
                TextEntry::make('comune.provincia.name')->label('Provincia'),
                TextEntry::make('comune.name')->label('Comune'),
                TextEntry::make('name')->label('Nome'),
                TextEntry::make('type')->label('Tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'città'    => 'success',
                        'frazione' => 'warning',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'città'    => 'Città',
                        'frazione' => 'Frazione',
                    }),
            ]);
    }
}
