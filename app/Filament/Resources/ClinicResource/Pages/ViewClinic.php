<?php

namespace App\Filament\Resources\ClinicResource\Pages;

use App\Filament\Resources\ClinicResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewClinic extends ViewRecord
{
    protected static string $resource = ClinicResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
