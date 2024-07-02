<?php

namespace App\Filament\Resources\SmsMessageResource\Pages;

use App\Filament\Resources\SmsMessageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSmsMessage extends EditRecord
{
    protected static string $resource = SmsMessageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
