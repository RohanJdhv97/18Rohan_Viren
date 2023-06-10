<?php

namespace App\Filament\Resources;

use App\Models\Health;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\HealthResource\Pages;

class HealthResource extends Resource
{
    protected static ?string $model = Health::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'enough_medicines';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('enough_medicines')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Enough Medicines')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('days_meds_missed')
                        ->rules(['numeric'])
                        ->required()
                        ->numeric()
                        ->placeholder('Days Meds Missed')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('cd4_count')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Cd4 Count')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('cd4_count_num')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Cd4 Count Num')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('viral_load_count')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Viral Load Count')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('viral_count_num')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Viral Count Num')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('fallen_sick')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Fallen Sick')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('share_health')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Share Health')
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
                Tables\Columns\TextColumn::make('enough_medicines')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('days_meds_missed')
                    ->toggleable()
                    ->searchable(true, null, true),
                Tables\Columns\TextColumn::make('cd4_count')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('cd4_count_num')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('viral_load_count')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('viral_count_num')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('fallen_sick')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('share_health')
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
            'index' => Pages\ListAllHealth::route('/'),
            'create' => Pages\CreateHealth::route('/create'),
            'view' => Pages\ViewHealth::route('/{record}'),
            'edit' => Pages\EditHealth::route('/{record}/edit'),
        ];
    }
}
