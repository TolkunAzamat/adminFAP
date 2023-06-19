<?php

namespace App\Filament\Resources\FapResource\Pages;

use App\Filament\Resources\FapResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFap extends EditRecord
{
    protected static string $resource = FapResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
