<?php

namespace App\Filament\Resources\TranslationCategoryResource\Pages;

use App\Filament\Resources\TranslationCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTranslationCategory extends EditRecord
{
    protected static string $resource = TranslationCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
