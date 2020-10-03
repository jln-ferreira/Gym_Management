<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Graduation;
use App\Student;
use App\Belt;
use App\Gym;

use Faker\Generator as Faker;

$factory->define(Graduation::class, function (Faker $faker) {
    return [
        'student_id' => function(){
        	return Student::all()->random();
        },
        'belt_id' => function(){
        	return Belt::all()->random();
        },
        'gym_id' => function(){
        	return Gym::all()->random();
        },
    ];
});
