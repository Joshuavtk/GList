<?php

/* @var $factory Factory */

use App\Franchise;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Franchise::class, function (Faker $faker) {
    return [
        'title' => $faker->firstName
    ];
});
