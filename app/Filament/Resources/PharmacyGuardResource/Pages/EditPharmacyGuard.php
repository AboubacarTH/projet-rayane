<?php

namespace App\Filament\Resources\PharmacyGuardResource\Pages;

use App\Filament\Resources\PharmacyGuardResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPharmacyGuard extends EditRecord
{
    protected static string $resource = PharmacyGuardResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
