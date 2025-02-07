<?php

namespace App\Filament\Resources\TestRegistrationResource\Pages;

use App\Filament\Resources\TestRegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTestRegistration extends EditRecord
{
    protected static string $resource = TestRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
