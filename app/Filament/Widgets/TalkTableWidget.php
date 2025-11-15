<?php

namespace App\Filament\Widgets;

use App\Models\Talk;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class TalkTableWidget extends TableWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Talk::query())
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
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
