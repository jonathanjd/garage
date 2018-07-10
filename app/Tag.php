<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = ['name'];

    public function garages()
    {
        # code...
        $this->belongsToMany(Garage::class);
    }
}
