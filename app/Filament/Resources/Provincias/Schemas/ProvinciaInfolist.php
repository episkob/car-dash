<?php

namespace App\Filament\Resources\Provincias\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProvinciaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('regione.country.name')->label('Paese'),
                TextEntry::make('regione.name')->label('Regione'),
                TextEntry::make('name')->label('Nome'),
            ]);
    }
}
