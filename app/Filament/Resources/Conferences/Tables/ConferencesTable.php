<?php

namespace App\Filament\Resources\Conferences\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ConferencesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextInputColumn::make('name')
                    ->rules(['required', 'min:3', 'max:255'])
                    ->searchable(),
                ToggleColumn::make('is_published'),
                TextColumn::make('description')
                    ->searchable(),
                TextColumn::make('start_date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('end_date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('status')
                    ->searchable()
                    ->badge(),
                TextColumn::make('region')
                    ->badge(),
                TextColumn::make('venue.name')
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
            ->filtersTriggerAction(fn($action) => $action->button()->label('Filters'))
            ->filters([
                TernaryFilter::make('is_published')
                    ->label('Published')
                    ->trueLabel('Published')
                    ->falseLabel('Unpublished'),
                SelectFilter::make('venue')
                    ->relationship('venue', 'name')
                    ->preload()
                    ->searchable()
                    ->multiple()
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
