<?php

namespace App\Filament\Resources\PromoEntryResource\Pages;

use App\Filament\Resources\PromoEntryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPromoEntry extends EditRecord
{
    protected static string $resource = PromoEntryResource::class;

    protected function getActions(): array
    {
        return [
        ];
    }
}
