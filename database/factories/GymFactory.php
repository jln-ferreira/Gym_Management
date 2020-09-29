<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Gym;
use Faker\Generator as Faker;

$factory->define(Gym::class, function (Faker $faker) {
    return [
        'name'     => $faker->name,
        'country'  => $faker->country,
        'address'  => $faker->address,
        'postcode' => $faker->postcode,
        'status'   => 1,
        'comment'  => $faker->realText(180)
    ];
});
