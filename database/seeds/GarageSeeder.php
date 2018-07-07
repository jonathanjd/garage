<?php

use Illuminate\Database\Seeder;

class GarageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $garage = new Garage();
        $garage->address = '949  Heron Way';
        $garage->city = 'Portland';
        $garage->state = 'OR';
        $garage->postal = '97204';
        $garage->lat = '';
        $garage->lng = '';
        $garage->title = '';
        $garage->description = '';
        $garage->startdate = '';
        $garage->enddate = '';
        $garage->starthour = '';
        $garage->endhour = '';
        $garage->type_garage_id = '';
        $garage->user_id = '';
        $garage->save();
    }
}
