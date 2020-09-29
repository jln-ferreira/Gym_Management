<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $guarded = [];

    // ------- RELATIONSHIP -------
    // gym > user
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
