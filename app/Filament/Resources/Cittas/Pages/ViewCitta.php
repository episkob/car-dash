<?php

namespace App\Filament\Resources\Cittas\Pages;

use App\Filament\Resources\Cittas\CittaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCitta extends ViewRecord
{
    protected static string $resource = CittaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
