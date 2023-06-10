<?php

namespace App\Filament\Resources\SocialNetworkResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\SocialNetworkResource;

class ListSocialNetworks extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = SocialNetworkResource::class;
}
