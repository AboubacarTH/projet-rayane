<?php

namespace App\Filament\Resources\PharmacyGroupResource\Pages;

use App\Filament\Resources\PharmacyGroupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPharmacyGroup extends ViewRecord
{
    protected static string $resource = PharmacyGroupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
