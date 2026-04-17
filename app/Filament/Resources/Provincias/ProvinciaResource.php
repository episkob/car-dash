<?php

namespace App\Filament\Resources\Provincias;

use App\Filament\Resources\Provincias\Pages\CreateProvincia;
use App\Filament\Resources\Provincias\Pages\EditProvincia;
use App\Filament\Resources\Provincias\Pages\ListProvincias;
use App\Filament\Resources\Provincias\Pages\ViewProvincia;
use App\Filament\Resources\Provincias\Schemas\ProvinciaForm;
use App\Filament\Resources\Provincias\Schemas\ProvinciaInfolist;
use App\Filament\Resources\Provincias\Tables\ProvinciasTable;
use App\Models\Provincia;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ProvinciaResource extends Resource
{
    protected static ?string $model = Provincia::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    protected static UnitEnum|string|null $navigationGroup = 'Localizzazione';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Province';

    protected static ?string $modelLabel = 'Provincia';

    protected static ?string $pluralModelLabel = 'Province';

    public static function form(Schema $schema): Schema
    {
        return ProvinciaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProvinciaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProvinciasTable::configure($table);
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
            'index' => ListProvincias::route('/'),
            'create' => CreateProvincia::route('/create'),
            'view' => ViewProvincia::route('/{record}'),
            'edit' => EditProvincia::route('/{record}/edit'),
        ];
    }
}
