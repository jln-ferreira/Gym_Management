<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use App\Belt;

use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name'    => $faker->name,
        'email'   => $faker->unique()->safeEmail,
        'age'     => $faker->numberBetween($min = 15, $max = 50),
        'address' => $faker->country,
        'belt_id' => function(){
        	return Belt::all()->random();
        },
        'status' => $faker->randomElement(['Trial', 'Student', 'Professor']),
        'total_attendance'      => $faker->randomDigit,
        'attendance_graduation' => $faker->randomDigit,

    ];
});
