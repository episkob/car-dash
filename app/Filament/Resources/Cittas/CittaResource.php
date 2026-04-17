<?php

namespace App\Filament\Resources\Cittas;

use App\Filament\Resources\Cittas\Pages\CreateCitta;
use App\Filament\Resources\Cittas\Pages\EditCitta;
use App\Filament\Resources\Cittas\Pages\ListCittas;
use App\Filament\Resources\Cittas\Pages\ViewCitta;
use App\Filament\Resources\Cittas\Schemas\CittaForm;
use App\Filament\Resources\Cittas\Schemas\CittaInfolist;
use App\Filament\Resources\Cittas\Tables\CittasTable;
use App\Models\Citta;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CittaResource extends Resource
{
    protected static ?string $model = Citta::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    protected static UnitEnum|string|null $navigationGroup = 'Localizzazione';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationLabel = 'Città';

    protected static ?string $modelLabel = 'Città';

    protected static ?string $pluralModelLabel = 'Città';

    public static function form(Schema $schema): Schema
    {
        return CittaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CittaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CittasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCittas::route('/'),
            'create' => CreateCitta::route('/create'),
            'view' => ViewCitta::route('/{record}'),
            'edit' => EditCitta::route('/{record}/edit'),
        ];
    }
}
