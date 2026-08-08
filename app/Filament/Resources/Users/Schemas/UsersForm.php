<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UsersForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true), // Fixes the "email already taken" error when saving edits
                
                TextInput::make('password')
                    ->password()
                    ->dehydrated(fn ($state) => filled($state)) // Keeps original password if left blank
                    ->required(fn (string $context): bool => $context === 'create') // Only required when creating a new user
                    ->maxLength(255),
            ]);
    }
}
