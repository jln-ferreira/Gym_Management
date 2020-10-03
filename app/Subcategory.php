<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $guarded = [];

    // ------- RELATIONSHIP -------
    public function item()
    {
        return $this->hasMany(Item::class);
    }
    // subcategory < gym
    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
