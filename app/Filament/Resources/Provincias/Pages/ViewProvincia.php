<?php

namespace App\Filament\Resources\Provincias\Pages;

use App\Filament\Resources\Provincias\ProvinciaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProvincia extends ViewRecord
{
    protected static string $resource = ProvinciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
