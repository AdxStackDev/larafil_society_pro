<?php

namespace App\Filament\Resources\Visitors;

use App\Filament\Resources\Visitors\Pages\CreateVisitors;
use App\Filament\Resources\Visitors\Pages\EditVisitors;
use App\Filament\Resources\Visitors\Pages\ListVisitors;
use App\Filament\Resources\Visitors\Pages\ViewVisitors;

use App\Filament\Resources\Visitors\Schemas\VisitorsForm;
use App\Filament\Resources\Visitors\Tables\VisitorsTable;

use App\Models\Visitors;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisitorsResource extends Resource
{
    protected static ?string $model = Visitors::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Visitors';

    public static function form(Schema $schema): Schema
    {
        return VisitorsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VisitorsTable::configure($table);
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
            'index' => ListVisitors::route('/'),
            'create' => CreateVisitors::route('/create'),
            'edit' => EditVisitors::route('/{record}/edit'),
            'view' => ViewVisitors::route('/{record}'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
