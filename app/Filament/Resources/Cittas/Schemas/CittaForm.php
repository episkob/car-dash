<?php

namespace App\Filament\Resources\Cittas\Schemas;

use App\Models\Country;
use App\Models\Comune;
use App\Models\Provincia;
use App\Models\Regione;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CittaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('country_id')
                    ->label('Paese')
                    ->options(Country::orderBy('name')->pluck('name', 'id'))
                    ->required()
                    ->live()
                    ->afterStateUpdated(fn ($set) => $set('regione_id', null) && $set('provincia_id', null) && $set('comune_id', null)),

                Select::make('regione_id')
                    ->label('Regione')
                    ->options(fn ($get) => Regione::where('country_id', $get('country_id'))->orderBy('name')->pluck('name', 'id'))
                    ->required()
                    ->live()
                    ->afterStateUpdated(fn ($set) => $set('provincia_id', null) && $set('comune_id', null)),

                Select::make('provincia_id')
                    ->label('Provincia')
                    ->options(fn ($get) => Provincia::where('regione_id', $get('regione_id'))->orderBy('name')->pluck('name', 'id'))
                    ->required()
                    ->live()
                    ->afterStateUpdated(fn ($set) => $set('comune_id', null)),

                Select::make('comune_id')
                    ->label('Comune')
                    ->options(fn ($get) => Comune::where('provincia_id', $get('provincia_id'))->orderBy('name')->pluck('name', 'id'))
                    ->required()
                    ->live(),

                TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),

                Select::make('type')
                    ->label('Tipo')
                    ->options([
                        'città'    => 'Città',
                        'frazione' => 'Frazione',
                    ])
                    ->required()
                    ->default('città'),
            ]);
    }
}
