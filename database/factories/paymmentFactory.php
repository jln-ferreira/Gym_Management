<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paymment;
use App\Student;
use App\Item;


use Faker\Generator as Faker;

$factory->define(Paymment::class, function (Faker $faker) {
    return [
        'student_id' => function(){
        	return Student::all()->random();
        },
        'date_paymment' => $faker->dateTime,
        'item_id' => function(){
        	return Item::all()->random();
        },
        'comment'       => $faker->text,
    ];
});
