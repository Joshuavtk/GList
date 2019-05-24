<?php

/* @var $factory Factory */

use App\Edition;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Edition::class, function (Faker $faker) {
    return [
        'title' => $faker->firstName
    ];
});
