<?php

namespace App\Filament\Resources\PharmacyGroupResource\Pages;

use App\Filament\Resources\PharmacyGroupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPharmacyGroups extends ListRecords
{
    protected static string $resource = PharmacyGroupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
