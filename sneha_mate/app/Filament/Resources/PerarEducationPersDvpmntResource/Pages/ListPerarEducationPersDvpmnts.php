<?php

namespace App\Filament\Resources\PerarEducationPersDvpmntResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\PerarEducationPersDvpmntResource;

class ListPerarEducationPersDvpmnts extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = PerarEducationPersDvpmntResource::class;
}
