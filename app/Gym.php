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
    // gym > students
    public function student()
    {
        return $this->hasMany(Student::class);
    }
    // gym > subcategory
    // public function subcategory()
    // {
    //     return $this->hasMany(Subcategory::class);
    // }
    // gym > item
    public function item()
    {
        return $this->hasMany(Item::class);
    }
    // gym > responsable
    // public function responsable()
    // {
    //     return $this->hasMany(Responsable::class);
    // }
    // gym > paymment
    // public function paymment()
    // {
    //     return $this->hasMany(Paymment::class);
    // }
    // gym > graduation
    // public function graduation()
    // {
    //     return $this->hasMany(Graduation::class);
    // }
    // gym > cost
    // public function cost()
    // {
    //     return $this->hasMany(Cost::class);
    // }
    // gym > belt
    public function belt()
    {
        return $this->hasMany(Belt::class);
    }
}
