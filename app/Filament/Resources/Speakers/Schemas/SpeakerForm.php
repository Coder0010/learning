<?php

namespace App\Filament\Resources\Speakers\Schemas;

use App\Models\Speaker;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SpeakerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Speaker Details')
                    ->columnSpanFull()
                    ->description('Please provide the details of the speaker.')
                    ->schema([
                        TextInput::make('name')
                            ->columns(1)
                            ->required(),
                        FileUpload::make('avatar')
                            ->columns(1)
                            ->avatar()
                            ->directory('speakers')
                            ->columnSpanFull(),
                        TextInput::make('email')
                            ->label('Email address')
                            ->email()
                            ->required(),
                        Textarea::make('bio')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('twitter_handle')
                            ->default('twitter')
                            ->required(),
                    ]),

                CheckboxList::make('qualifications')
                    ->columnSpanFull()
                    ->searchable()
                    ->options(fn() => (Speaker::QUALIFICATIONS))
                    ->bulkToggleable()
                    ->columns(3),
            ]);
    }

}
