<?php

namespace App\Filament\Resources\PromoEntryResource\Pages;

use App\Exports\EntryExport;
use App\Filament\Resources\PromoEntryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Closure;
use Maatwebsite\Excel\Facades\Excel;

class ListPromoEntries extends ListRecords
{
    protected static string $resource = PromoEntryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\Action::make('Export entries')->action(function ()
            {
                return Excel::download(new EntryExport, 'Promo_entries.xlsx');

            })
        ];
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return null;
    }
}
