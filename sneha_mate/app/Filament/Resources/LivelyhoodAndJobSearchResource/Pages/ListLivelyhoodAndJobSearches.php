<?php

namespace App\Filament\Resources\LivelyhoodAndJobSearchResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\LivelyhoodAndJobSearchResource;

class ListLivelyhoodAndJobSearches extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = LivelyhoodAndJobSearchResource::class;
}
