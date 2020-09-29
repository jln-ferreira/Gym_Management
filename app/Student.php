<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    // ------- RELATIONSHIP -------
    // student > Graduation
    public function graduation()
    {
        return $this->hasMany(Graduation::class);
    }

    // student > belt
    public function belt()
    {
        return $this->belongsTo(Belt::class);
    }

    // student > Paymment
    public function paymment()
    {
        return $this->hasMany(Paymment::class);
    }

    // student > responsable
    public function responsable()
    {
        return $this->hasMany(Responsable::class);
    }


}
