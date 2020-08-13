<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Responsable;
use App\Student;
use Faker\Generator as Faker;

$factory->define(Responsable::class, function (Faker $faker) {
    return [
        'name'      => $faker->name,
        'email'     => $faker->unique()->safeEmail,
        'phoneNumber' => $faker->numberBetween($min = 9100000, $max = 9999999),
        'kinship' => $faker->randomElement(['Father', 'Brother', 'Mother']),
        'student_id'   => function(){
        	return Student::all()->random();
        },
    ];
});
