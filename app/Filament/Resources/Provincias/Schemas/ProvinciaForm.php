<?php

namespace App\Filament\Resources\Provincias\Schemas;

use App\Models\Regione;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProvinciaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('regione_id')
                    ->label('Regione')
                    ->options(Regione::orderBy('name')->pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
