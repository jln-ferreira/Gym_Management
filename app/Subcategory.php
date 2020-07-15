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
}
