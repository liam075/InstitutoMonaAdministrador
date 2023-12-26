<?php

namespace App\Filament\Resources\CarrerasResource\Pages;

use App\Filament\Resources\CarrerasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarreras extends ListRecords
{
    protected static string $resource = CarrerasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
