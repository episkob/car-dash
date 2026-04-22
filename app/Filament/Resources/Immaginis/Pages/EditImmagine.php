<?php

namespace App\Filament\Resources\Immaginis\Pages;

use App\Filament\Resources\Immaginis\ImmagineResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditImmagine extends EditRecord
{
    protected static string $resource = ImmagineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
