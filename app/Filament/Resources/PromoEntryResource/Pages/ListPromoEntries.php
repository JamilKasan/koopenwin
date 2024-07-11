<?php

namespace App\Filament\Resources\PromoEntryResource\Pages;

use App\Filament\Resources\PromoEntryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Closure;

class ListPromoEntries extends ListRecords
{
    protected static string $resource = PromoEntryResource::class;

    protected function getActions(): array
    {
        return [
        ];
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return null;
    }
}
