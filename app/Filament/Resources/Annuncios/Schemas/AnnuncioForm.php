<?php

namespace App\Filament\Resources\Annuncios\Schemas;

use App\Filament\Forms\Components\GalleryPicker;
use App\Models\Citta;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AnnuncioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titolo')
                    ->label('Titolo')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Select::make('citta_id')
                    ->label('Città / Frazione')
                    ->searchable()
                    ->getSearchResultsUsing(fn (string $search) =>
                        Citta::where('name', 'like', "%{$search}%")
                            ->with(['comune.provincia.regione.country'])
                            ->limit(50)
                            ->get()
                            ->mapWithKeys(fn ($c) => [
                                $c->id => $c->name
                                    . ' (' . ($c->comune?->name ?? '')
                                    . ', ' . ($c->comune?->provincia?->name ?? '')
                                    . ')',
                            ])
                    )
                    ->getOptionLabelUsing(fn ($value) =>
                        Citta::with(['comune.provincia'])->find($value)?->name
                    )
                    ->live()
                    ->columnSpanFull(),

                Placeholder::make('comune_display')
                    ->label('Comune')
                    ->content(fn ($get) =>
                        Citta::with('comune')->find($get('citta_id'))?->comune?->name ?? '—'
                    ),

                Placeholder::make('provincia_display')
                    ->label('Provincia')
                    ->content(fn ($get) =>
                        Citta::with('comune.provincia')->find($get('citta_id'))?->comune?->provincia?->name ?? '—'
                    ),

                Placeholder::make('regione_display')
                    ->label('Regione')
                    ->content(fn ($get) =>
                        Citta::with('comune.provincia.regione')->find($get('citta_id'))?->comune?->provincia?->regione?->name ?? '—'
                    ),

                Placeholder::make('paese_display')
                    ->label('Paese')
                    ->content(fn ($get) =>
                        Citta::with('comune.provincia.regione.country')->find($get('citta_id'))?->comune?->provincia?->regione?->country?->name ?? '—'
                    ),

                Textarea::make('testo')
                    ->label('Testo')
                    ->required()
                    ->rows(8)
                    ->columnSpanFull(),

                GalleryPicker::make('immagini')
                    ->label('Immagini dalla galleria')
                    ->columnSpanFull(),

                FileUpload::make('nuove_immagini')
                    ->label('Carica nuove immagini nella galleria')
                    ->image()
                    ->multiple()
                    ->disk('public')
                    ->directory('galleria')
                    ->imagePreviewHeight('120')
                    ->columnSpanFull(),
            ]);
    }
}
