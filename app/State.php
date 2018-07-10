<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    protected $fillable = ['code', 'name', 'lat', 'lng'];

    public function garages()
    {
        # code...
        return $this->hasMany(Garage::class);
    }

}
