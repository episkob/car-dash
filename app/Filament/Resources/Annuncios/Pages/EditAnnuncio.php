<?php

namespace App\Filament\Resources\Annuncios\Pages;

use App\Filament\Resources\Annuncios\AnnuncioResource;
use App\Models\Immagine;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAnnuncio extends EditRecord
{
    protected static string $resource = AnnuncioResource::class;

    private array $selectedImageIds = [];
    private array $uploadedPaths    = [];

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['immagini'] = $this->record->immagini->pluck('id')->toArray();
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->selectedImageIds = $data['immagini'] ?? [];
        $this->uploadedPaths    = $data['nuove_immagini'] ?? [];

        unset($data['immagini'], $data['nuove_immagini']);

        return $data;
    }

    protected function afterSave(): void
    {
        // Sync gallery-selected images
        $this->record->immagini()->sync($this->selectedImageIds);

        // Create Immagine records for newly uploaded files and attach them
        foreach ($this->uploadedPaths as $path) {
            $immagine = Immagine::create(['path' => $path, 'disk' => 'public']);
            $this->record->immagini()->attach($immagine->id);
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
