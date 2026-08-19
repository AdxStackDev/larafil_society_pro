<?php

namespace App\Filament\Resources\Visitors\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;

//for filter
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;


class VisitorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('contact_no'),
                TextColumn::make('address'),                    
                TextColumn::make('host'),
                TextColumn::make('arrival'),
                TextColumn::make('departure'),
            ])
            ->filters([
                TrashedFilter::make(),
                Filter::make('arrival')
                ->query(fn (Builder $query): Builder => $query->whereNotNull('arrival')),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
