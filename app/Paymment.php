<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymment extends Model
{
    protected $guarded = [];

    // ------- RELATIONSHIP -------
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Paymment < item
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    // paymment < gym
    // public function gym()
    // {
    //     return $this->belongsTo(Gym::class);
    // }
}
