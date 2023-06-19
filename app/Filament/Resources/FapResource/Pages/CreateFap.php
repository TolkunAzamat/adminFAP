<?php

namespace App\Filament\Resources\FapResource\Pages;

use App\Filament\Resources\FapResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFap extends CreateRecord
{
    protected static string $resource = FapResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
