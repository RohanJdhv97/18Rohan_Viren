<?php

namespace App\Filament\Resources\DiscloserAndSuppotResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\DiscloserAndSuppotResource;

class ListDiscloserAndSuppots extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = DiscloserAndSuppotResource::class;
}
