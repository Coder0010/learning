<?php

namespace App\Filament\Resources\Conferences\Pages;

use App\Filament\Resources\Conferences\ConferenceResource;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListConferences extends ListRecords
{
    protected static string $resource = ConferenceResource::class;

    public function getTabs(): array
    {
        return [
            Tab::make('all'),
            Tab::make('Published')->modifyQueryUsing(fn(Builder $query) => $query->where('is_published', true)),
            Tab::make('unpublish')->modifyQueryUsing(fn(Builder $query) => $query->where('is_published', false)),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->slideOver()->after(callback: function () {
                Notification::make()->success()->title('Conference Created')->send();
            }),
        ];
    }
}
