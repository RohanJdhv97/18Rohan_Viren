<?php

namespace App\Filament\Resources;

use App\Models\LivelyhoodAndJobSearch;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\LivelyhoodAndJobSearchResource\Pages;

class LivelyhoodAndJobSearchResource extends Resource
{
    protected static ?string $model = LivelyhoodAndJobSearch::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'livelihood_training_program';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('livelihood_training_program')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Livelihood Training Program')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('sibling_job')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Sibling Job')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('travel_to_art_center_program')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Travel To Art Center Program')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Select::make('user_id')
                        ->rules(['exists:users,id'])
                        ->required()
                        ->relationship('user', 'name')
                        ->searchable()
                        ->placeholder('User')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                Tables\Columns\TextColumn::make('livelihood_training_program')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('sibling_job')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('travel_to_art_center_program')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('user.name')
                    ->toggleable()
                    ->limit(50),
            ])
            ->filters([
                DateRangeFilter::make('created_at'),

                SelectFilter::make('user_id')
                    ->relationship('user', 'name')
                    ->indicator('User')
                    ->multiple()
                    ->label('User'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLivelyhoodAndJobSearches::route('/'),
            'create' => Pages\CreateLivelyhoodAndJobSearch::route('/create'),
            'view' => Pages\ViewLivelyhoodAndJobSearch::route('/{record}'),
            'edit' => Pages\EditLivelyhoodAndJobSearch::route('/{record}/edit'),
        ];
    }
}
