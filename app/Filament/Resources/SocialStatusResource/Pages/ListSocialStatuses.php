<?php

namespace App\Filament\Resources\SocialStatusResource\Pages;

use App\Filament\Resources\SocialStatusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSocialStatuses extends ListRecords
{
    protected static string $resource = SocialStatusResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
