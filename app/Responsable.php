<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $guarded = [];

        // ------- RELATIONSHIP -------
        public function student()
        {
            return $this->belongsTo(Student::class);
        }
}
