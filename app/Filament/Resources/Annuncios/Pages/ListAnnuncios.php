<?php

namespace App\Filament\Resources\Annuncios\Pages;

use App\Filament\Resources\Annuncios\AnnuncioResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAnnuncios extends ListRecords
{
    protected static string $resource = AnnuncioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
