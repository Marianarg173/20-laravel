<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
USE App\Models\Adoption;
USE App\Models\pet;

class AdoptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adop = new Adoption;
        $adop->user_id = 2;
        $adop->pet_id = 4;
        if ($adop->save()) {
            $pet = pet::find(4);
            $pet->status = '1';
            $pet->save();
        }
        $adop->save();
    }
}
