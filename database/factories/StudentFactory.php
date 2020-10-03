<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use App\Belt;
use App\Gym;

use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name'                  => $faker->name,
        'email'                 => $faker->unique()->safeEmail,
        'phoneNumber'           => $faker->numberBetween($min = 9100000, $max = 9999999),
        'databirth'             => $faker->dateTimeBetween('-50 years', '-10 years'),
        'address'               => $faker->country,
        'belt_id'               => function(){
        	return Belt::all()->random();
        },
        'status'                => $faker->randomElement(['Trial', 'Student', 'Professor']),
        'comment'               => $faker->realText(180),
        'total_attendance'      => $faker->randomDigit,
        'attendance_graduation' => $faker->randomDigit,
        'gym_id'                => function(){
        	return Gym::all()->random();
        },
    ];
});
