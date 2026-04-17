<?php

namespace App\Filament\Resources\Regiones\Pages;

use App\Filament\Resources\Regiones\RegioneResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRegione extends ViewRecord
{
    protected static string $resource = RegioneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
