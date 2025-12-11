<?php

namespace App\Imports;

use App\Models\pet;
use Maatwebsite\Excel\Concerns\ToModel;

class PetsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new pet([
            //
        ]);
    }
}
