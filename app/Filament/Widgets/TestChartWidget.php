<?php

namespace App\Filament\Widgets;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;

class TestChartWidget extends Widget implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

    protected string $view = 'filament.widgets.test';

    protected $listeners = [
        'speaker.accept' => 'onAccept',
        'speaker.decline' => 'onDecline',
    ];

    public function onAccept()
    {
        Notification::make()->success()->title('You accepted!')->send();

    }

    public function onDecline()
    {
        Notification::make()->danger()->title('You rejected!')->send();

    }
    public function callNotification(): Action
    {
        return Action::make('callNotification')
            ->button()
            ->color('success')
            ->label('Call')
            ->action(function () {
                Notification::make()
                    ->warning()
                    ->title('Hello, world!')
                    ->body('This is a notification.')
                    ->actions([
                        Action::make('accept')
                            ->label('Accept')
                            ->dispatch('speaker.accept'),
                        Action::make('decline')
                            ->label('Decline')
                            ->dispatch('speaker.decline'),
                    ])
                    ->send();
            });
    }

}
