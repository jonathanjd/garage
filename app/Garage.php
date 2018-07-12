<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    //
    protected $fillable = [
        'address',
        'city',
        'postal',
        'lat',
        'lng',
        'title',
        'description',
        'startdate',
        'enddate',
        'starthour',
        'endhour',
        'state_id',
        'type_garage_id',
        'user_id',
    ];

    public function state()
    {
        # code...
        return $this->belongsTo(State::class);
    }

    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        # code...
        return $this->hasMany(Image::class);
    }

    public function tags()
    {
        # code...
        return $this->belongsToMany(Tag::class);
    }

    //Mutators
    public function setAddressAttribute($value)
    {
        # code...
        $this->attributes['address'] = strtolower($value);
    }

    public function setCityAttribute($value)
    {
        # code...
        $this->attributes['city'] = strtolower($value);
    }

    //Accessors
    public function getCityAttribute($value)
    {
        # code...
        return ucwords($value);
    }

    public function getAddressAttribute($value)
    {
        # code...
        return ucwords($value);
    }

}
