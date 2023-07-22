<?php

namespace App\Filament\Resources\QuarterResource\Pages;

use App\Filament\Resources\QuarterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuarters extends ListRecords
{
    protected static string $resource = QuarterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
