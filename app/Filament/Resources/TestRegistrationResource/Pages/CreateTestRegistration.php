<?php

namespace App\Filament\Resources\TestRegistrationResource\Pages;

use App\Filament\Resources\TestRegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTestRegistration extends CreateRecord
{
    protected static string $resource = TestRegistrationResource::class;
}
