<?php

namespace App\Filament\Resources\PharmacyGroupResource\Pages;

use App\Filament\Resources\PharmacyGroupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPharmacyGroup extends EditRecord
{
    protected static string $resource = PharmacyGroupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
