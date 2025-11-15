<?php

namespace App\Filament\Resources\Speakers\Widgets;

use App\Filament\Resources\Speakers\Pages\ListSpeakers;
use App\Models\Speaker;
use App\Models\Talk;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SpeakerStatsWidget extends BaseWidget
{
    use InteractsWithPageTable;

    protected static ?int $sort = 1;
    protected ?string $heading = 'Speaker Stats';
    protected ?string $description = 'Overview of Speakers and Talks';
    protected ?string $pollingInterval = '1s';
    protected function getTablePage(): string
    {
        return ListSpeakers::class;
    }

    protected function getStats(): array
    {
        $query = $this->getPageTableQuery();
        return [
            Stat::make('Total Speakers', $query->count())
                ->icon('heroicon-o-user-group')
                ->description('Speakers')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17])
            ,
            Stat::make('Total Talks', $query->withCount('talks')->pluck('talks_count')->sum())
                ->description('Talks')
                ->icon('heroicon-o-microphone')
                ->color('warning'),
        ];
    }
}
