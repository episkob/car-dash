<?php

namespace App\Filament\Resources\Annuncios\Pages;

use App\Filament\Resources\Annuncios\AnnuncioResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAnnuncio extends ViewRecord
{
    protected static string $resource = AnnuncioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
