<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\RelationManagers\RelationManager;

class SocialNetworksRelationManager extends RelationManager
{
    protected static string $relationship = 'socialNetworks';

    protected static ?string $recordTitleAttribute = 'tb_positive';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([
                TextInput::make('tb_positive')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Tb Positive')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('hiv_friends')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Hiv Friends')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('friends_same_art')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Friends Same Art')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('where_met_friends')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Where Met Friends')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('attended_camp')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Attended Camp')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('friends_in_camp')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Friends In Camp')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('topics_of_discussion')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Topics Of Discussion')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('likes_in_camp')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Likes In Camp')
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
                Tables\Columns\TextColumn::make('tb_positive')->limit(50),
                Tables\Columns\TextColumn::make('hiv_friends')->limit(50),
                Tables\Columns\TextColumn::make('friends_same_art')->limit(50),
                Tables\Columns\TextColumn::make('where_met_friends')->limit(50),
                Tables\Columns\TextColumn::make('attended_camp')->limit(50),
                Tables\Columns\TextColumn::make('friends_in_camp')->limit(50),
                Tables\Columns\TextColumn::make('topics_of_discussion')->limit(
                    50
                ),
                Tables\Columns\TextColumn::make('likes_in_camp')->limit(50),
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
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
