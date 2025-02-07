<?php

namespace App\Filament\Resources\TranslationRegistrationResource\Pages;

use App\Filament\Resources\TranslationRegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTranslationRegistration extends EditRecord
{
    protected static string $resource = TranslationRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
