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

    public function cost()
    {
        return $this->hasMany(Cost::class);
    }

    // Item < subcategory
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
