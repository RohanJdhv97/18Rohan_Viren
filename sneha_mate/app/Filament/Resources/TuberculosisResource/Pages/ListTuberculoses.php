<?php

namespace App\Filament\Resources\TuberculosisResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\TuberculosisResource;

class ListTuberculoses extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = TuberculosisResource::class;
}
