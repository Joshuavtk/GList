<?php

use App\Edition;
use App\Franchise;
use App\Game;
use App\Platform;
use App\Tag;
use App\User;
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
        $gameTitlesPrepend = Game::GAME_TITLES_APPEND;
        $gameTitlesAppend = Game::GAME_TITLES_PREPEND;

        for ($i = 0; $i < 100; $i++) {
//            $platform = Platform::all()->random();
//            $franchise = Franchise::all()->random();
//            $edition = Edition::all()->random();
            $game = new Game;
            $game->user_id = User::all()->first()->id;
            $game->title = $this->faker->randomElement($gameTitlesPrepend) . ' ' . $this->faker->randomElement($gameTitlesAppend);
            $game->body = $this->faker->realText(200);
            $game->thumbnail_url = $this->faker->imageUrl(200, 200);
            $game->price_estimate = $this->faker->numberBetween(0, 1000);
            $game->amount_paid = $this->faker->numberBetween(0, 1000);
            $game->urgency = $this->faker->numberBetween(0, 3);
            $game->favorite = $this->faker->boolean;
            $game->game_owned = $this->faker->boolean;
            $game->book_owned = $this->faker->boolean;
            $game->box_owned = $this->faker->boolean;
            $game->score = $this->faker->numberBetween(0, 10);
            $game->progression_status_code = $this->faker->numberBetween(1, 5);
            $game->release_date_at = $this->faker->dateTimeThisMonth();
            $game->obtained_at = $this->faker->dateTimeThisMonth();
            $game->finished_at = $this->faker->dateTimeThisMonth();

//            $platform->games()->save($game);
            $tag = Tag::all()->where('category', '=', 0)->random();
            $tag->games()->save($game);
            $tag = Tag::all()->where('category', '=', 1)->random();
            $tag->games()->save($game);
            $tag = Tag::all()->where('category', '=', 2)->random();
            $tag->games()->save($game);
            $tag = Tag::all()->where('category', '=', 3)->random();
            $tag->games()->save($game);
//            $franchise->games()->save($game);
//            $edition->games()->save($game);
//            $game->franchises
//            factory(Game::class)->create([
//                'platform_id' => $platform
//            ]);
        }
    }
}
