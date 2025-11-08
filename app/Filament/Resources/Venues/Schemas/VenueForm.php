<?php

namespace App\Filament\Resources\Venues\Schemas;

use App\Enums\Region;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VenueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->default('Venue Region')
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('city')
                    ->default('City ')
                    ->required(),
                TextInput::make('country')
                    ->default('Country ')
                    ->required(),
                Select::make('region')
                    ->enum(Region::class)
                    ->options(Region::class)
                    ->required(),
                TextInput::make('postal_code')
                    ->default('12345')
                    ->required(),
            ]);
    }
}
