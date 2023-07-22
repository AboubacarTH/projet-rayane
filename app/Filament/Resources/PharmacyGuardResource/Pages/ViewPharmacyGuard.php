<?php

namespace App\Filament\Resources\PharmacyGuardResource\Pages;

use App\Filament\Resources\PharmacyGuardResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPharmacyGuard extends ViewRecord
{
    protected static string $resource = PharmacyGuardResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
