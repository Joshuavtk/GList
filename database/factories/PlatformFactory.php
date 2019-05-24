<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Platform;
use Faker\Generator as Faker;

$factory->define(Platform::class, function (Faker $faker) {
    return [
        'title' => $faker->firstName
    ];
});
