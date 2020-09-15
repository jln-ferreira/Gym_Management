<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $guarded = [];

    // cost < item
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
