<?php

namespace App\Filament\Resources\Comunes\Schemas;

use App\Models\Provincia;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ComuneForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('provincia_id')
                    ->label('Provincia')
                    ->options(Provincia::orderBy('name')->pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
