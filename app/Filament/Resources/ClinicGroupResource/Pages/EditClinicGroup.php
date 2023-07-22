<?php

namespace App\Filament\Resources\ClinicGroupResource\Pages;

use App\Filament\Resources\ClinicGroupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClinicGroup extends EditRecord
{
    protected static string $resource = ClinicGroupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
