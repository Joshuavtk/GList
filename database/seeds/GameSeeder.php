<?php

use App\Franchise;
use App\Game;
use App\Platform;
use App\Tag;
use Faker\Factory;
use Illuminate\Database\Seeder;

/**
 * Class GameSeeder
 */
class GameSeeder extends Seeder
{
    /**
     * @var Generator
     */
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('nl_NL');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gameTitlesPrepend = ['Super', 'The Legend of', 'League of', 'Dying', 'Stardew', 'Garry\'s', 'Hollow', 'Mirror\'s', 'Team', 'The', 'Tomb', 'Fallout:', 'Dead', 'Black', 'Cities:', 'Bloody', 'Circle', 'Lego'];
        $gameTitlesAppend = ['Mario', 'Zelda', 'Legends', 'Light', 'Valley', 'Mod', 'Knight', 'Edge', 'Fortress', 'Witcher', 'Raider', 'New Vegas', 'Island', 'Mesa', 'Skylines', 'Trapland', 'Empires', 'City'];

        for ($i = 0; $i < 100; $i++) {
            $platform = Platform::all()->random();
            $tag = Tag::all()->random();
            $franchise = Franchise::all()->random();
            $game = new Game;
            $game->title = $this->faker->randomElement($gameTitlesPrepend) . ' ' . $this->faker->randomElement($gameTitlesAppend);
            $game->body = $this->faker->realText(200);
            $game->thumbnail_url = $this->faker->imageUrl(200, 200);
            $game->sales_amount = $this->faker->numberBetween(0, 1000);
            $game->urgency = $this->faker->numberBetween(0, 10);
            $game->favorite = $this->faker->boolean;
            $game->score = $this->faker->numberBetween(0, 10);
            $game->release_date_at = $this->faker->dateTimeThisMonth();
            $game->obtained_at = $this->faker->dateTimeThisMonth();
            $game->finished_at = $this->faker->dateTimeThisMonth();

            $platform->games()->save($game);
            $tag->games()->save($game);
            $franchise->games()->save($game);
//            $game->franchises
//            factory(Game::class)->create([
//                'platform_id' => $platform
//            ]);
        }
    }
}
