<?php

namespace App\Filament\Resources\Speakers\Pages;

use App\Filament\Resources\Speakers\SpeakerResource;
use App\Filament\Resources\Speakers\Widgets\SpeakerStatsWidget;
use Filament\Actions\CreateAction;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Filament\Resources\Pages\ListRecords;

class ListSpeakers extends ListRecords
{
    use ExposesTableToWidgets;

    protected static string $resource = SpeakerResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            SpeakerStatsWidget::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
