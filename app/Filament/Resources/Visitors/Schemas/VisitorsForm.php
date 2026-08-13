<?php

namespace App\Filament\Resources\Visitors\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Schemas\Schema;

class VisitorsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->inlineLabel()
            ->components([
                TextInput::make('name')->autofocus(),
                TextInput::make('contact_no'),
                TextInput::make('address'),                    
                TextInput::make('host'),
                TextInput::make('arrival'),
                TextInput::make('departure'),
            ]);
    }
}
