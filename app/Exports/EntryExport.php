<?php

namespace App\Exports;

use App\Models\PromoEntry;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class EntryExport implements FromView
{
    public function view() :View
    {
        $entries = PromoEntry::query()->orderBy('code')->get();
        return \view('Export.EntryExport', ['entries' => $entries]);
    }
}
