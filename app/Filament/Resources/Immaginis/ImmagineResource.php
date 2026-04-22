<?php

namespace App\Filament\Resources\Immaginis;

use App\Filament\Resources\Immaginis\Pages\CreateImmagine;
use App\Filament\Resources\Immaginis\Pages\EditImmagine;
use App\Filament\Resources\Immaginis\Pages\ListImmaginis;
use App\Filament\Resources\Immaginis\Schemas\ImmagineForm;
use App\Filament\Resources\Immaginis\Tables\ImmaginesTable;
use App\Models\Immagine;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ImmagineResource extends Resource
{
    protected static ?string $model = Immagine::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static UnitEnum|string|null $navigationGroup = 'Annunci';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Galleria';

    protected static ?string $modelLabel = 'Immagine';

    protected static ?string $pluralModelLabel = 'Galleria';

    public static function form(Schema $schema): Schema
    {
        return ImmagineForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ImmaginesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListImmaginis::route('/'),
            'create' => CreateImmagine::route('/create'),
            'edit' => EditImmagine::route('/{record}/edit'),
        ];
    }
}
