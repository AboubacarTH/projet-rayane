<?php

namespace App\Filament\Resources\PharmacyGuardResource\Pages;

use App\Filament\Resources\PharmacyGuardResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPharmacyGuards extends ListRecords
{
    protected static string $resource = PharmacyGuardResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
