<?php

namespace App\Filament\Resources\Speakers\RelationManagers;

use App\Filament\Resources\Speakers\SpeakerResource;
use App\Filament\Resources\Talks\TalkResource;
use App\Models\Talk;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TalksRelationManager extends RelationManager
{
    protected static string $relationship = 'talks';

    protected static ?string $relatedResource = TalkResource::class;

//    public function form(Schema $schema): Schema
//    {
//    }


    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->headerActions([
                CreateAction::make()->slideOver(),
            ]);
    }
}
