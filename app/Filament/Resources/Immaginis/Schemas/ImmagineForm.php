<?php

namespace App\Filament\Resources\Immaginis\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ImmagineForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('path')
                    ->label('Immagine')
                    ->image()
                    ->disk('public')
                    ->directory('galleria')
                    ->required()
                    ->imagePreviewHeight('200')
                    ->columnSpanFull(),

                TextInput::make('nome')
                    ->label('Nome (opzionale)')
                    ->maxLength(255)
                    ->columnSpanFull(),
            ]);
    }
}
