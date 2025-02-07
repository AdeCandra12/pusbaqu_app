<?php

namespace App\Filament\Resources\TranslationRegistrationResource\Pages;

use App\Filament\Resources\TranslationRegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTranslationRegistrations extends ListRecords
{
    protected static string $resource = TranslationRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
