<?php

namespace App\Filament\Resources\Annuncios\Pages;

use App\Filament\Resources\Annuncios\AnnuncioResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAnnuncio extends EditRecord
{
    protected static string $resource = AnnuncioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
