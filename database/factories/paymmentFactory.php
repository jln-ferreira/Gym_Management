<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paymment;
use App\Student;
use App\Item;
use App\Gym;


use Faker\Generator as Faker;

$factory->define(Paymment::class, function (Faker $faker) {
    return [
        'student_id'    => function(){
        	return Student::all()->random();
        },
        'date_paymment' => $faker->dateTime,
        'item_id'       => function(){
        	return Item::all()->random();
        },
        'quantity'    => $faker->numberBetween($min = 1, $max = 10),
        'final_value' => $faker->numberBetween($min = 100, $max = 1500),
        'comment'     => $faker->text,
        'active'      => 1,
    ];
});
