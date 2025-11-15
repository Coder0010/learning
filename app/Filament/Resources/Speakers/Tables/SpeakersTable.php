<?php

namespace App\Filament\Resources\Speakers\Tables;

use App\Models\Speaker;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SpeakersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->persistFiltersInSession()
            ->columns([
                TextInputColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                ImageColumn::make('avatar')
                    ->circular()
                    ->columnSpanFull(),
                TextColumn::make('qualifications')
                    ->badge(),
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
                SelectFilter::make('qualifications')
                    ->label('Qualifications')
                    ->options(Speaker::QUALIFICATIONS)
                    ->searchable()
                    ->multiple()
                    ->query(function ($query, array $data) {
                        $values = $data['values'] ?? [];

                        if (! count($values)) return $query;

                        return $query->where(function ($q) use ($values) {
                            foreach ($values as  $value) {
                                $q->orWhereJsonContains('qualifications', $value);
                            }
                        });
                    })
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }
}
