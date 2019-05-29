<?php

/* @var $factory Factory */

use App\Game;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Game::class, function (Faker $faker) {
    $gameTitlesPrepend = ['Super', 'The Legend of', 'League of', 'Dying', 'Stardew', 'Garry\'s', 'Hollow', 'Mirror\'s', 'Team', 'The', 'Tomb', 'Fallout:', 'Dead', 'Black', 'Cities:', 'Bloody', 'Circle', 'Lego'];
    $gameTitlesAppend = ['Mario', 'Zelda', 'Legends', 'Light', 'Valley', 'Mod', 'Knight', 'Edge', 'Fortress', 'Witcher', 'Raider', 'New Vegas', 'Island', 'Mesa', 'Skylines', 'Trapland', 'Empires', 'City'];

    return [
        'title' => $faker->randomElement($gameTitlesPrepend) . ' ' . $faker->randomElement($gameTitlesAppend),
        'body' => $faker->realText(200),
        'urgency' => $faker->numberBetween(0,3),
        'favorite' => $faker->boolean,
        'score' => $faker->numberBetween(0,10),
        'obtained_at' => $faker->dateTimeThisMonth(),
        'finished_at' => $faker->dateTimeThisMonth(),
    ];
});
