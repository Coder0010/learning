<?php

namespace App\Filament\Resources\Speakers;

use App\Filament\Resources\Speakers\Pages\EditSpeaker;
use App\Filament\Resources\Speakers\Pages\ListSpeakers;
use App\Filament\Resources\Speakers\Pages\ViewSpeaker;
use App\Filament\Resources\Speakers\RelationManagers\TalksRelationManager;
use App\Filament\Resources\Speakers\Schemas\SpeakerForm;
use App\Filament\Resources\Speakers\Tables\SpeakersTable;
use App\Models\Speaker;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Widgets\AccountWidget;
use Illuminate\Database\Eloquent\Model;

class SpeakerResource extends Resource
{
    protected static ?int $navigationSort = 1; // OR this form

    protected static ?string $model = Speaker::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'type' => 'Speaker',
            'name' => $record->name,
            'email' => $record->email,
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return SpeakerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SpeakersTable::configure($table);
    }

    public static function getWidgets(): array
    {
        return [];
    }

    public static function getRelations(): array
    {
        return [
            TalksRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSpeakers::route('/'),
            'view' => ViewSpeaker::route('/{record}'),
//            'edit' => EditSpeaker::route('/{record}/edit'),
//            'create' => CreateSpeaker::route('/create'),
        ];
    }
}
