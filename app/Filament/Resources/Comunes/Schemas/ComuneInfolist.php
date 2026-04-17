<?php

namespace App\Filament\Resources\Comunes\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ComuneInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('provincia.regione.country.name')->label('Paese'),
                TextEntry::make('provincia.regione.name')->label('Regione'),
                TextEntry::make('provincia.name')->label('Provincia'),
                TextEntry::make('name')->label('Nome'),
            ]);
    }
}
