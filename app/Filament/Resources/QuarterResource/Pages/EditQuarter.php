<?php

namespace App\Filament\Resources\QuarterResource\Pages;

use App\Filament\Resources\QuarterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuarter extends EditRecord
{
    protected static string $resource = QuarterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
