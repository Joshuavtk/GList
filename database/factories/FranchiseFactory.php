<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Franchise;
use Faker\Generator as Faker;

$factory->define(Franchise::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
    ];
});
