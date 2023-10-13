<?php

namespace App\Filament\Resources\VendedoresResource\Pages;

use App\Filament\Resources\VendedoresResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVendedores extends EditRecord
{
    protected static string $resource = VendedoresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
