<?php

namespace App\Filament\Resources\Immaginis\Pages;

use App\Filament\Resources\Immaginis\ImmagineResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListImmaginis extends ListRecords
{
    protected static string $resource = ImmagineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
