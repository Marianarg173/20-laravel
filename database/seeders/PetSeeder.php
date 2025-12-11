<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\pet;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pet = new pet;
        $pet->name = 'Firulais';
        $pet->kind = 'Dog';
        $pet->weight = '7.65';
        $pet->age = '2';
        $pet->breed = 'French Bulldog';
        $pet->location = 'Paris';
        $pet->description = 'Black dog so charming, lovely';
        $pet->save();

        $pet = new pet;
        $pet->kind = 'Dog';
        $pet->name = 'Killer';
        $pet->weight = '18';
        $pet->age = '6';
        $pet->breed = 'Canne Corso';
        $pet->location = 'Milan';
        $pet->description = 'Explosive & Hungry, be careful with it, Danger';
        $pet->save();


        $pet = new pet;
        $pet->kind = 'Michi';
        $pet->name = 'Cat';
        $pet->weight = '8';
        $pet->age = '3';
        $pet->breed = 'Bengali';
        $pet->location = 'E.E.U.U';
        $pet->description = 'It has an active, curious, affectionate and intelligent character, which is complemented by its energy and ability to climb.';
        $pet->save();

        $pet = new pet;
        $pet->kind = 'Chanchi';
        $pet->name = 'pig';
        $pet->weight = '30';
        $pet->age = '5';
        $pet->breed = 'Mini pig';
        $pet->location = 'Los Angeles';
        $pet->description = 'intelligent and sociable,';
        $pet->save();
    }
}
