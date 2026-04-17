<?php

namespace App\Filament\Resources\Regiones\Pages;

use App\Filament\Resources\Regiones\RegioneResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRegiones extends ListRecords
{
    protected static string $resource = RegioneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
