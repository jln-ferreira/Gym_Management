<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;

use App\Item;
use App\Subcategory;

use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
            'subcategory_id' => function(){
                return Subcategory::all()->random();
            },
            'name'           => $faker->name,
            'value'          => $faker->numberBetween($min = 50, $max = 100),
            'sell'           => $faker->numberBetween($min = 100, $max = 200),
            'identifier'     => $faker->randomElement(['c', 'p', 'cp']) //c = cost | p = payment | cp = both
    ];
});
