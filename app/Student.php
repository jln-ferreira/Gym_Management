<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    // ------- RELATIONSHIP -------
    // User > Graduation
    public function graduation()
    {
        return $this->hasMany(Graduation::class);
    }

    // User > belt
    public function belt()
    {
        return $this->belongsTo(Belt::class);
    }

    // User > Paymment
    public function paymment()
    {
        return $this->hasMany(Paymment::class);
    }
}
