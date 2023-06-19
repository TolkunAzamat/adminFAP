<?php

namespace App\Filament\Resources\SocialStatusResource\Pages;

use App\Filament\Resources\SocialStatusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSocialStatus extends CreateRecord
{
    protected static string $resource = SocialStatusResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
