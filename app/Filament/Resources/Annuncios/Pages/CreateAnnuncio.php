<?php

namespace App\Filament\Resources\Annuncios\Pages;

use App\Filament\Resources\Annuncios\AnnuncioResource;
use App\Models\Immagine;
use Filament\Resources\Pages\CreateRecord;

class CreateAnnuncio extends CreateRecord
{
    protected static string $resource = AnnuncioResource::class;

    private array $selectedImageIds = [];
    private array $uploadedPaths    = [];

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->selectedImageIds = $data['immagini'] ?? [];
        $this->uploadedPaths    = $data['nuove_immagini'] ?? [];

        unset($data['immagini'], $data['nuove_immagini']);

        return $data;
    }

    protected function afterCreate(): void
    {
        // Attach images selected from gallery
        if (!empty($this->selectedImageIds)) {
            $this->record->immagini()->sync($this->selectedImageIds);
        }

        // Create Immagine records for newly uploaded files and attach them
        foreach ($this->uploadedPaths as $path) {
            $immagine = Immagine::create(['path' => $path, 'disk' => 'public']);
            $this->record->immagini()->attach($immagine->id);
        }
    }
}
