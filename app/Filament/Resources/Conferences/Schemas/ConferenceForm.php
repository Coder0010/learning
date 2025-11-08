<?php

namespace App\Filament\Resources\Conferences\Schemas;

use App\Enums\Region;
use App\Models\Venue;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class ConferenceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Conference Details')
                    ->collapsible()
                    ->description('Please provide the details of the conference.')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->columnSpanFull()
                            ->required(),
                        RichEditor::make('description')
                            ->toolbarButtons([
                                ['bold', 'italic', 'underline', 'strike', 'link'],
                            ])
                            ->columnSpanFull()
                            ->required(),
                        DateTimePicker::make('start_date')
                            ->required(),
                        DateTimePicker::make('end_date')
                            ->required(),
                    ]),
                FieldSet::make('Conference Settings')
                    ->columnSpanFull()
                    ->schema([
                        Select::make('status')
                            ->options([
                                'upcoming' => 'Upcoming',
                                'ongoing' => 'Ongoing',
                                'completed' => 'Completed',
                            ])
                            ->required(),
                        Toggle::make('is_published')
                            ->required()
                            ->default(true)
                    ]),
                Select::make('region')
                    ->live()
                    ->options(Region::class)
                    ->required(),
                Select::make('venue_id')
                    ->relationship(
                        name: 'venue',
                        titleAttribute: 'name',
                        modifyQueryUsing: function (Builder $query, Get $get) {
                            $region = $get('region');

                            if (!$region) {
                                return $query;
                            }

                            $regionValue = $region instanceof Region ? $region->value : $region;
                            return $query->where('region', $regionValue);
                        }
                    ),
            ]);
    }
}
