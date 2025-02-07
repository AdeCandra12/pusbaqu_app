<?php

namespace App\Filament\Resources\TestRegistrationResource\Pages;

use App\Filament\Resources\TestRegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestRegistrations extends ListRecords
{
    protected static string $resource = TestRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
