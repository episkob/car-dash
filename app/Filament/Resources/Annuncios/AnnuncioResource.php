<?php

namespace App\Filament\Resources\Annuncios;

use App\Filament\Resources\Annuncios\Pages\CreateAnnuncio;
use App\Filament\Resources\Annuncios\Pages\EditAnnuncio;
use App\Filament\Resources\Annuncios\Pages\ListAnnuncios;
use App\Filament\Resources\Annuncios\Pages\ViewAnnuncio;
use App\Filament\Resources\Annuncios\Schemas\AnnuncioForm;
use App\Filament\Resources\Annuncios\Schemas\AnnuncioInfolist;
use App\Filament\Resources\Annuncios\Tables\AnnunciosTable;
use App\Models\Annuncio;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AnnuncioResource extends Resource
{
    protected static ?string $model = Annuncio::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMegaphone;

    protected static ?string $recordTitleAttribute = 'titolo';

    protected static UnitEnum|string|null $navigationGroup = 'Annunci';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Annunci';

    protected static ?string $modelLabel = 'Annuncio';

    protected static ?string $pluralModelLabel = 'Annunci';

    public static function form(Schema $schema): Schema
    {
        return AnnuncioForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AnnuncioInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AnnunciosTable::configure($table);
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
            'index' => ListAnnuncios::route('/'),
            'create' => CreateAnnuncio::route('/create'),
            'view' => ViewAnnuncio::route('/{record}'),
            'edit' => EditAnnuncio::route('/{record}/edit'),
        ];
    }
}
