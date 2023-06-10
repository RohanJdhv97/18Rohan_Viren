<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class AllHealthRelationManager extends RelationManager
{
    protected static string $relationship = 'allHealth';

    protected static ?string $recordTitleAttribute = 'enough_medicines';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([
                TextInput::make('enough_medicines')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Enough Medicines')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('days_meds_missed')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Days Meds Missed')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('cd4_count')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Cd4 Count')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('cd4_count_num')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Cd4 Count Num')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('viral_load_count')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Viral Load Count')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('viral_count_num')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Viral Count Num')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('fallen_sick')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Fallen Sick')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('share_health')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Share Health')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('enough_medicines')->limit(50),
                Tables\Columns\TextColumn::make('days_meds_missed'),
                Tables\Columns\TextColumn::make('cd4_count')->limit(50),
                Tables\Columns\TextColumn::make('cd4_count_num')->limit(50),
                Tables\Columns\TextColumn::make('viral_load_count')->limit(50),
                Tables\Columns\TextColumn::make('viral_count_num')->limit(50),
                Tables\Columns\TextColumn::make('fallen_sick')->limit(50),
                Tables\Columns\TextColumn::make('share_health')->limit(50),
                Tables\Columns\TextColumn::make('user.name')->limit(50),
            ])
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '>=',
                                    $date
                                )
                            )
                            ->when(
                                $data['created_until'],
                                fn(
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '<=',
                                    $date
                                )
                            );
                    }),

                MultiSelectFilter::make('user_id')->relationship(
                    'user',
                    'name'
                ),
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
