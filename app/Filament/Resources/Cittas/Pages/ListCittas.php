<?php

namespace App\Filament\Resources\Cittas\Pages;

use App\Filament\Resources\Cittas\CittaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCittas extends ListRecords
{
    protected static string $resource = CittaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
