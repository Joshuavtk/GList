<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Tag;
use App\User;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'title' => $faker->firstName,
        'category' => $faker->numberBetween(0,3),
        'user_id' => User::all()->first()->id
    ];
});
