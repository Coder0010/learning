<?php

namespace App\Filament\Resources\Speakers\Widgets;

use App\Models\Speaker;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class SpeakerTableWidget extends TableWidget
{
    protected static ?int $sort = 2;


    public function table(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => Speaker::query())
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                ImageColumn::make('avatar')
                    ->circular()
                    ->columnSpanFull(),

                TextColumn::make('twitter_handle')
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
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
