<?php

namespace App\Filament\Resources\Regiones\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RegioneInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('country.name')->label('Paese'),
                TextEntry::make('name')->label('Nome'),
            ]);
    }
}
