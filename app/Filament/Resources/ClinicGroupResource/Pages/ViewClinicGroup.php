<?php

namespace App\Filament\Resources\ClinicGroupResource\Pages;

use App\Filament\Resources\ClinicGroupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewClinicGroup extends ViewRecord
{
    protected static string $resource = ClinicGroupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
