<?php

namespace App\Filament\Pages;

use App\Filament\Resources\Speakers\Widgets\SpeakerStatsWidget;
use App\Filament\Widgets\TestChartWidget;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\AccountWidget;

class Dashboard extends BaseDashboard
{
    protected static ?int $navigationSort = 1;
    protected static string|null|\BackedEnum $navigationIcon = 'heroicon-o-rectangle-stack';

    public function getWidgets(): array
    {
        return [
            AccountWidget::class,
            SpeakerStatsWidget::class,
            TestChartWidget::class,
        ];
    }

}
