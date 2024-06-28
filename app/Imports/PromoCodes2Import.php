<?php

namespace App\Imports;

use App\Models\PromoCode;
use Maatwebsite\Excel\Concerns\ToModel;

class PromoCodes2Import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PromoCode([
            'test' => $row[0]
        ]);
    }


}
