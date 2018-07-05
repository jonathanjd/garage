<?php

use Illuminate\Database\Seeder;
use App\TypeGarage;

class TypeGarageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $typeGarage = new TypeGarage();
        $typeGarage->name = "Garage/Yard Sale";
        $typeGarage->save();

        $typeGarage = new TypeGarage();
        $typeGarage->name = "Moving Sale";
        $typeGarage->save();

        $typeGarage = new TypeGarage();
        $typeGarage->name = "Multi-family Sale";
        $typeGarage->save();

        $typeGarage = new TypeGarage();
        $typeGarage->name = "Estate Sale";
        $typeGarage->save();

        $typeGarage = new TypeGarage();
        $typeGarage->name = "Neighborhood Sale";
        $typeGarage->save();

        $typeGarage = new TypeGarage();
        $typeGarage->name = "Business";
        $typeGarage->save();

        $typeGarage = new TypeGarage();
        $typeGarage->name = "Other";
        $typeGarage->save();

    }
}
