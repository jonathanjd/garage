<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = ['name', 'garage_id'];

    public function garage()
    {
        # code...
        return $this->belongsTo(Garage::class);
    }
}
