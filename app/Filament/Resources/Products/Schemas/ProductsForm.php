<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->maxLength(255),                
                TextInput::make('price')->required()->maxLength(255),
                TestInput::make('quantity')->maxLength(255),
                
            ]);
    }
}
