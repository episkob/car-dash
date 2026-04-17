<?php

namespace App\Filament\Resources\Regiones\Pages;

use App\Filament\Resources\Regiones\RegioneResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRegione extends EditRecord
{
    protected static string $resource = RegioneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
