<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;

use App\Subcategory;
use App\Gym;

use Faker\Generator as Faker;

$factory->define(Subcategory::class, function (Faker $faker) {
    return [
            'name'   => $faker->name,
            'active' => 1,
    ];
});
