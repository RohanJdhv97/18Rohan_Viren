<?php

namespace App\Filament\Resources;

use App\Models\PerarEducationPersDvpmnt;
use Filament\{Tables, Forms};
use Filament\Resources\{Form, Table, Resource};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\PerarEducationPersDvpmntResource\Pages;

class PerarEducationPersDvpmntResource extends Resource
{
    protected static ?string $model = PerarEducationPersDvpmnt::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'understanding_life_choices';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('understanding_life_choices')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Understanding Life Choices')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('qualities_for_pe')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Qualities For Pe')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make(
                        'focus_for_independent_And_sustainable_life'
                    )
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder(
                            'Focus For Independent And Sustainable Life'
                        )
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('pe_help_future')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Pe Help Future')
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
                Tables\Columns\TextColumn::make('understanding_life_choices')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('qualities_for_pe')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make(
                    'focus_for_independent_And_sustainable_life'
                )
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('pe_help_future')
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
            'index' => Pages\ListPerarEducationPersDvpmnts::route('/'),
            'create' => Pages\CreatePerarEducationPersDvpmnt::route('/create'),
            'view' => Pages\ViewPerarEducationPersDvpmnt::route('/{record}'),
            'edit' => Pages\EditPerarEducationPersDvpmnt::route(
                '/{record}/edit'
            ),
        ];
    }
}
