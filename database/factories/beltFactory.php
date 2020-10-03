<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Belt;
use App\Gym;

use Faker\Generator as Faker;

$factory->define(Belt::class, function (Faker $faker) {
    return [
        'name'            => $faker->colorName,
        'days_graduation' => $faker->numberBetween($min = 100, $max = 300),
        'gym_id'          => function(){
        	return Gym::all()->random();
        },
    ];
});
