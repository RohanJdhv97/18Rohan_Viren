<?php

namespace App\Filament\Resources\PersonalInfoResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\PersonalInfoResource;

class ListPersonalInfos extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = PersonalInfoResource::class;
}
