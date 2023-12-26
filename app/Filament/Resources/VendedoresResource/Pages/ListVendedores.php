<?php

namespace App\Filament\Resources\VendedoresResource\Pages;

use App\Filament\Resources\VendedoresResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVendedores extends ListRecords
{
    protected static string $resource = VendedoresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
