<?php

namespace App\Filament\Widgets;

use App\Models\Education;
use App\Models\Health;
use App\Models\Tuberculosis;
use App\Models\User;
use App\Models\Session;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class PlaceWidget extends BaseWidget
{

    protected function getCards(): array
    {
        return [
            Card::make('12th Pass', Education::where('current_qualification','12th Pass')->count())
                ->descriptionIcon('heroicon-s-user-group')
                ->chart([89, 72, 56, 33, 91, 62, 48])
                ->color('primary'),
            Card::make('CD4 Count', Health::where('cd4_count_num','above 550')->count())
                ->descriptionIcon('heroicon-s-user-group')
                ->chart([31, 70, 91, 98, 54, 33, 71])
                ->color('danger'),
            Card::make('TB Positive', Tuberculosis::where('TB_positive','No')->count())
                ->descriptionIcon('heroicon-s-user-group')
                ->chart([60, 92, 33, 80, 31, 98, 70])
                ->color('success'),
        ];
    }
}