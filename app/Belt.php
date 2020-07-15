<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Belt extends Model
{
    protected $guarded = [];


    // ------- RELATIONSHIP -------
    public function student()
    {
        return $this->hasMany(Student::class);
    }
}

