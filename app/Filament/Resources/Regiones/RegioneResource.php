<?php

namespace App\Filament\Resources\Regiones;

use App\Filament\Resources\Regiones\Pages\CreateRegione;
use App\Filament\Resources\Regiones\Pages\EditRegione;
use App\Filament\Resources\Regiones\Pages\ListRegiones;
use App\Filament\Resources\Regiones\Pages\ViewRegione;
use App\Filament\Resources\Regiones\Schemas\RegioneForm;
use App\Filament\Resources\Regiones\Schemas\RegioneInfolist;
use App\Filament\Resources\Regiones\Tables\RegionesTable;
use App\Models\Regione;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RegioneResource extends Resource
{
    protected static ?string $model = Regione::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    protected static UnitEnum|string|null $navigationGroup = 'Localizzazione';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Regioni';

    protected static ?string $modelLabel = 'Regione';

    protected static ?string $pluralModelLabel = 'Regioni';

    public static function form(Schema $schema): Schema
    {
        return RegioneForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RegioneInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RegionesTable::configure($table);
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
            'index' => ListRegiones::route('/'),
            'create' => CreateRegione::route('/create'),
            'view' => ViewRegione::route('/{record}'),
            'edit' => EditRegione::route('/{record}/edit'),
        ];
    }
}
