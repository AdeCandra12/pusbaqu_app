<?php

namespace App\Filament\Resources\TestCategoryResource\Pages;

use App\Filament\Resources\TestCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestCategories extends ListRecords
{
    protected static string $resource = TestCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
