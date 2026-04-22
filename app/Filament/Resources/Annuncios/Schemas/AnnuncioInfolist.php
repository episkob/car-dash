<?php

namespace App\Filament\Resources\Annuncios\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AnnuncioInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('titolo')
                    ->label('Titolo')
                    ->columnSpanFull(),
                TextEntry::make('citta.name')
                    ->label('Città / Frazione'),
                TextEntry::make('citta.comune.name')
                    ->label('Comune'),
                TextEntry::make('citta.comune.provincia.name')
                    ->label('Provincia'),
                TextEntry::make('citta.comune.provincia.regione.name')
                    ->label('Regione'),
                TextEntry::make('citta.comune.provincia.regione.country.name')
                    ->label('Paese'),
                TextEntry::make('testo')
                    ->label('Testo')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->label('Creato il')
                    ->dateTime('d.m.Y H:i'),
                TextEntry::make('updated_at')
                    ->label('Aggiornato il')
                    ->dateTime('d.m.Y H:i'),

                ImageEntry::make('immagini.path')
                    ->label('Immagini')
                    ->disk('public')
                    ->height(120)
                    ->columnSpanFull(),
            ]);
    }
}
