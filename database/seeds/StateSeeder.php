<?php

use Illuminate\Database\Seeder;
use App\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        State::truncate();
        $state = new State();
        $state->code = 'AL';
        $state->name = 'Alabama';
        $state->lat = '32.806671';
        $state->lng = '-86.791130';
        $state->save();

        $state = new State();
        $state->code = 'AK';
        $state->name = 'Alaska';
        $state->lat = '61.370716';
        $state->lng = '-152.404419';
        $state->save();

        $state = new State();
        $state->code = 'AZ';
        $state->name = 'Arizona';
        $state->lat = '33.729759';
        $state->lng = '-111.431221';
        $state->save();

        $state = new State();
        $state->code = 'AR';
        $state->name = 'Arkansas';
        $state->lat = '34.969704';
        $state->lng = '-92.373123';
        $state->save();

        $state = new State();
        $state->code = 'CA';
        $state->name = 'California';
        $state->lat = '36.116203';
        $state->lng = '-119.681564';
        $state->save();

        $state = new State();
        $state->code = 'CO';
        $state->name = 'Colorado';
        $state->lat = '39.059811';
        $state->lng = '-105.311104';
        $state->save();

        $state = new State();
        $state->code = 'CT';
        $state->name = 'Connecticut';
        $state->lat = '41.597782';
        $state->lng = '-72.755371';
        $state->save();

        $state = new State();
        $state->code = 'DE';
        $state->name = 'Delaware';
        $state->lat = '39.318523';
        $state->lng = '-75.507141';
        $state->save();

        $state = new State();
        $state->code = 'DC';
        $state->name = 'District of Columbia';
        $state->lat = '38.897438';
        $state->lng = '-77.026817';
        $state->save();

        $state = new State();
        $state->code = 'FL';
        $state->name = 'Florida';
        $state->lat = '27.766279';
        $state->lng = '-81.686783';
        $state->save();

        $state = new State();
        $state->code = 'GA';
        $state->name = 'Georgia';
        $state->lat = '33.040619';
        $state->lng = '-83.643074';
        $state->save();

        $state = new State();
        $state->code = 'HI';
        $state->name = 'Hawaii';
        $state->lat = '21.094318';
        $state->lng = '-157.498337';
        $state->save();

        $state = new State();
        $state->code = 'ID';
        $state->name = 'Idaho';
        $state->lat = '44.240459';
        $state->lng = '-114.478828';
        $state->save();

        $state = new State();
        $state->code = 'IL';
        $state->name = 'Illinois';
        $state->lat = '40.349457';
        $state->lng = '-88.986137';
        $state->save();

        $state = new State();
        $state->code = 'IN';
        $state->name = 'Indiana';
        $state->lat = '39.849426';
        $state->lng = '-86.258278';
        $state->save();

        $state = new State();
        $state->code = 'IA';
        $state->name = 'Iowa';
        $state->lat = '42.011539';
        $state->lng = '-93.210526';
        $state->save();

        $state = new State();
        $state->code = 'KS';
        $state->name = 'Kansas';
        $state->lat = '38.526600';
        $state->lng = '-96.726486';
        $state->save();

        $state = new State();
        $state->code = 'KY';
        $state->name = 'Kentucky';
        $state->lat = '37.668140';
        $state->lng = '-84.670067';
        $state->save();

        $state = new State();
        $state->code = 'LA';
        $state->name = 'Louisiana';
        $state->lat = '31.169546';
        $state->lng = '-91.867805';
        $state->save();

        $state = new State();
        $state->code = 'ME';
        $state->name = 'Maine';
        $state->lat = '44.693947';
        $state->lng = '-69.381927';
        $state->save();

        $state = new State();
        $state->code = 'MD';
        $state->name = 'Maryland';
        $state->lat = '39.063946';
        $state->lng = '-76.802101';
        $state->save();

        $state = new State();
        $state->code = 'MA';
        $state->name = 'Massachusetts';
        $state->lat = '42.230171';
        $state->lng = '-71.530106';
        $state->save();

        $state = new State();
        $state->code = 'MI';
        $state->name = 'Michigan';
        $state->lat = '43.326618';
        $state->lng = '-84.536095';
        $state->save();

        $state = new State();
        $state->code = 'MN';
        $state->name = 'Minnesota';
        $state->lat = '45.694454';
        $state->lng = '-93.900192';
        $state->save();

        $state = new State();
        $state->code = 'MS';
        $state->name = 'Mississippi';
        $state->lat = '32.741646';
        $state->lng = '-89.678696';
        $state->save();

        $state = new State();
        $state->code = 'MO';
        $state->name = 'Missouri';
        $state->lat = '38.456085';
        $state->lng = '-92.288368';
        $state->save();

        $state = new State();
        $state->code = 'MT';
        $state->name = 'Montana';
        $state->lat = '46.921925';
        $state->lng = '-110.454353';
        $state->save();

        $state = new State();
        $state->code = 'NE';
        $state->name = 'Nebraska';
        $state->lat = '41.125370';
        $state->lng = '-98.268082';
        $state->save();

        $state = new State();
        $state->code = 'NV';
        $state->name = 'Nevada';
        $state->lat = '38.313515';
        $state->lng = '-117.055374';
        $state->save();

        $state = new State();
        $state->code = 'NH';
        $state->name = 'New Hampshire';
        $state->lat = '43.452492';
        $state->lng = '-71.563896';
        $state->save();

        $state = new State();
        $state->code = 'NJ';
        $state->name = 'New Jersey';
        $state->lat = '40.298904';
        $state->lng = '-74.521011';
        $state->save();

        $state = new State();
        $state->code = 'NM';
        $state->name = 'New Mexico';
        $state->lat = '34.840515';
        $state->lng = '-106.248482';
        $state->save();

        $state = new State();
        $state->code = 'NY';
        $state->name = 'New York';
        $state->lat = '42.165726';
        $state->lng = '-74.948051';
        $state->save();

        $state = new State();
        $state->code = 'NC';
        $state->name = 'North Carolina';
        $state->lat = '35.630066';
        $state->lng = '-79.806419';
        $state->save();

        $state = new State();
        $state->code = 'ND';
        $state->name = 'North Dakota';
        $state->lat = '47.528912';
        $state->lng = '-99.784012';
        $state->save();

        $state = new State();
        $state->code = 'OH';
        $state->name = 'Ohio';
        $state->lat = '40.388783';
        $state->lng = '-82.764915';
        $state->save();

        $state = new State();
        $state->code = 'OK';
        $state->name = 'Oklahoma';
        $state->lat = '35.565342';
        $state->lng = '-96.928917';
        $state->save();

        $state = new State();
        $state->code = 'OR';
        $state->name = 'Oregon';
        $state->lat = '44.572021';
        $state->lng = '-122.070938';
        $state->save();

        $state = new State();
        $state->code = 'PA';
        $state->name = 'Pennsylvania';
        $state->lat = '40.590752';
        $state->lng = '-77.209755';
        $state->save();

        $state = new State();
        $state->code = 'RI';
        $state->name = 'Rhode Island';
        $state->lat = '41.680893';
        $state->lng = '-71.511780';
        $state->save();

        $state = new State();
        $state->code = 'SC';
        $state->name = 'South Carolina';
        $state->lat = '33.856892';
        $state->lng = '-80.945007';
        $state->save();

        $state = new State();
        $state->code = 'SD';
        $state->name = 'South Dakota';
        $state->lat = '44.299782';
        $state->lng = '-99.438828';
        $state->save();

        $state = new State();
        $state->code = 'TN';
        $state->name = 'Tennessee';
        $state->lat = '35.747845';
        $state->lng = '-86.692345';
        $state->save();

        $state = new State();
        $state->code = 'TX';
        $state->name = 'Texas';
        $state->lat = '31.054487';
        $state->lng = '-97.563461';
        $state->save();

        $state = new State();
        $state->code = 'UT';
        $state->name = 'Utah';
        $state->lat = '40.150032';
        $state->lng = '-111.862434';
        $state->save();

        $state = new State();
        $state->code = 'VT';
        $state->name = 'Vermont';
        $state->lat = '44.045876';
        $state->lng = '-72.710686';
        $state->save();

        $state = new State();
        $state->code = 'VA';
        $state->name = 'Virginia';
        $state->lat = '37.769337';
        $state->lng = '-78.169968';
        $state->save();

        $state = new State();
        $state->code = 'WA';
        $state->name = 'Washington';
        $state->lat = '47.400902';
        $state->lng = '-121.490494';
        $state->save();

        $state = new State();
        $state->code = 'WV';
        $state->name = 'West Virginia';
        $state->lat = '38.491226';
        $state->lng = '-80.954453';
        $state->save();

        $state = new State();
        $state->code = 'WI';
        $state->name = 'Wisconsin';
        $state->lat = '44.268543';
        $state->lng = '-89.616508';
        $state->save();

        $state = new State();
        $state->code = 'WY';
        $state->name = 'Wyoming';
        $state->lat = '42.755966';
        $state->lng = '-107.302490';
        $state->save();

    }
}
