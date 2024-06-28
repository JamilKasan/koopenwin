<?php

namespace App\Imports;

use App\Models\PromoCode;
use Maatwebsite\Excel\Concerns\ToModel;
//use Maatwebsite\Excel\Concerns\ToCollection

class PromoCodesImport implements ToModel
{


    public function model(array $row)
    {
        return new PromoCode([
            'code2' => $row[0]
        ]);
    }
}
