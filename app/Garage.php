<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    //
    protected $fillable = [
        'address',
        'city',
        'state',
        'postal',
        'lat',
        'lng',
        'title',
        'description',
        'startdate',
        'enddate',
        'starthour',
        'endhour',
        'type_garage_id',
        'user_id',
    ];
}
