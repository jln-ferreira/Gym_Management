<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];

    // ------- RELATIONSHIP -------
    public function paymment()
    {
        return $this->hasMany(Paymment::class);
    }
}
