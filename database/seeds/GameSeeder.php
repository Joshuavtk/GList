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
        $gameTitlesPrepend = [
            'Super', 'The Legend of', 'Crash', 'Dying', 'Stardew', 'Garry\'s', 'Hollow', 'Mirror\'s', 'Team', 'The',
            'Tomb', 'Fallout:', 'Dead', 'Black', 'Cities:', 'Bloody', 'Circle', 'Lego', 'Tom Clancy\'s', 'Astolfo\'s',
            'Donkey Kong:', 'Don\'t', 'Divinity', 'Grand Theft', 'Into', 'Rainbow Six:', 'Age of', 'Rocket', 'League of',
            'Watch', 'Bioshock', 'Plants vs.', 'Mario & Rabbits', 'South Park:', 'Yoshi\'s', 'Sid Meier\'s', 'Sekiro:',
            'Farming', 'Risk of', 'Kerbal', 'Super Smash Brothers:', 'Dota', 'World of', 'Conker\'s', 'Realm of the',
            'Fire Emblem:', 'Russian', 'Super', 'Custom', 'Golden', 'Happy', 'Wario Lands:', 'Metroid', 'Call of',
            'One Piece:', 'Kirby:', 'PlayerUnknown\'s', 'AdVenture', 'Hotel', 'Dr.', 'Luigi\'s', 'Nier', 'Final', 'Bloons',
            'Doki Doki'
        ];
        $gameTitlesAppend = [
            'Mario', 'Zelda', 'Bandicoot', 'Light', 'Valley', 'Mod', 'Knight', 'Edge', 'Fortress', 'Witcher', 'Raider',
            'New Vegas', 'Island', 'Mesa', 'Skylines', 'Trapland', 'Empires', 'City', 'Fortnite', 'Secret', 'Country',
            'Starve', 'Original Sin', 'Auto', 'Game', 'The Breach', 'Siege', 'Empire', 'League', 'Legends', 'Dogs',
            'Infinite', 'Zombies', 'Kingdom Battle', 'The Stick of Truth', 'The Fractured But Whole', 'Terraria',
            'Civilization', 'Shadows Die Twice', 'Simulator', 'Rain', 'Hentai', 'Space Program', 'Ultimate', '2',
            'Warcraft', 'Bad Fur Day', 'Mad God', 'Fates', 'Fishing', 'Meat Boy', 'Robo', 'Sun', 'Wheels',
            'The Shake Dimension', 'Samus Returns', 'Duty', 'Cthulhu', 'Pirate Warriors', 'Funpack', 'Battlegrounds',
            'Capitalist', 'Mansion', 'Automata', 'Fantasy', 'Tower Defence', 'Literature Club!'
        ];

        for ($i = 0; $i < 100; $i++) {
            $platform = Platform::all()->random();
            $tag = Tag::all()->random();
            $franchise = Franchise::all()->random();
            $edition = Edition::all()->random();
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

            $platform->games()->save($game);
            $tag->games()->save($game);
            $franchise->games()->save($game);
            $edition->games()->save($game);
//            $game->franchises
//            factory(Game::class)->create([
//                'platform_id' => $platform
//            ]);
        }
    }
}
