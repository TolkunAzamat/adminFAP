<?php

namespace App\Filament\Resources\FapResource\Pages;

use App\Filament\Resources\FapResource;
use App\Filament\Resources\FapResource\Widgets\FapStateOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFaps extends ListRecords
{
    protected static string $resource = FapResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return[
            FapStateOverview::class,
        ];
    }
}
