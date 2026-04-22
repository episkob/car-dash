<?php

namespace App\Filament\Forms\Components;

use App\Models\Immagine;
use Filament\Forms\Components\Field;
use Illuminate\Support\Collection;

class GalleryPicker extends Field
{
    protected string $view = 'filament.forms.components.gallery-picker';

    protected function setUp(): void
    {
        parent::setUp();

        $this->default([]);

        $this->dehydrateStateUsing(
            fn ($state) => is_array($state) ? array_values(array_filter($state, 'is_numeric')) : []
        );
    }

    public function getGalleryImages(): Collection
    {
        return Immagine::orderByDesc('created_at')->get();
    }
}
