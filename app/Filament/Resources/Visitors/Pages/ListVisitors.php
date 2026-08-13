<?php

namespace App\Filament\Resources\Visitors\Pages;

use App\Filament\Resources\Visitors\VisitorsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Resources\Visitors\Widgets\Visitors as VisitorsChart;

class ListVisitors extends ListRecords
{
    protected static string $resource = VisitorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            VisitorsChart::class,
        ];
    }
        
}
