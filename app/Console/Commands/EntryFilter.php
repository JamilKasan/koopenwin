<?php

namespace App\Console\Commands;

use App\Classes\CodeValidation;
use App\Models\CodeRange;
use App\Models\PromoEntry;
use Illuminate\Console\Command;

class EntryFilter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'filter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $winningEntries = PromoEntry::query()->whereIn('code', ['0916s', '0916S', '0237H', '0237h', '0219v', '0219V', '0301k', '0301K', '0577Y', '0577y', '0021a', '0021A', '0239A', '0239a', '0253v', '0253V'])->get();
        foreach ($winningEntries as $e)
        {
            $e->winner = true;
            $e->valid = false;
            $e->save();
        }
        $entries = PromoEntry::query()->orderBy('created_at')->whereNot('winner', true)->get();
//        echo print_r($entries);
//        return null;
        $entryArray = [];
        foreach ($entries as $entry)
        {
            $range = CodeRange::query()->first();
            $validation = new CodeValidation();
            $validation->start = $range->start;
            $validation->end = $range->end;
            $validation->code = $entry->code;
            if ($validation->validate())
            {
                if (!in_array($entry->code, $entryArray))
                {
                    $entryArray[] = $entry->code;
                    $entry->valid = $validation->validate();
                    $entry->save();
                }
                else
                {
                    $entry->valid = false;
                    $entry->save();
                }
            }

        }
    }
}
