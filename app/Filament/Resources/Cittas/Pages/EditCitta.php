<?php

namespace App\Filament\Resources\Cittas\Pages;

use App\Filament\Resources\Cittas\CittaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCitta extends EditRecord
{
    protected static string $resource = CittaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
