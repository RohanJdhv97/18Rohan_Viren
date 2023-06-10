<?php

namespace App\Filament\Resources\EducationResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\EducationResource;

class ListAllEducation extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = EducationResource::class;
}
