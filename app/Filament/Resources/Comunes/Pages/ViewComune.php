<?php

namespace App\Filament\Resources\Comunes\Pages;

use App\Filament\Resources\Comunes\ComuneResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewComune extends ViewRecord
{
    protected static string $resource = ComuneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
