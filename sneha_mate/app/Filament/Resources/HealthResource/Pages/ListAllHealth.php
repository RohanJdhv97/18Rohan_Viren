<?php

namespace App\Filament\Resources\HealthResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\HealthResource;
use App\Filament\Traits\HasDescendingOrder;

class ListAllHealth extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = HealthResource::class;
}
