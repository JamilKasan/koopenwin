<?php

namespace App\Filament\Resources\CodeRangeResource\Pages;

use App\Filament\Resources\CodeRangeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCodeRange extends EditRecord
{
    protected static string $resource = CodeRangeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
