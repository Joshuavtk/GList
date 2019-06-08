<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Game
 * @package App
 * @property integer id
 * @property integer user_id
 * @property string title
 * @property string body
 * @property string thumbnail_url
 * @property string amount_paid
 * @property string price_estimate
 * @property string urgency
 * @property string favorite
 * @property string score
 * @property string obtained_at
 * @property string finished_at
 * @property string release_date_at
 * @property integer progression_status_code
 * @property object platforms
 * @property object franchises
 * @property object tags
 * @property object editions
 * @property boolean game_owned
 * @property boolean book_owned
 * @property boolean box_owned
 */
class Game extends Model
{
    protected $fillable = [
        'title',
        'body',
        'thumbnail_url',
        'urgency',
        'favorite',
        'score',
        'amount_paid',
        'price_estimate',
        'obtained_at',
        'finished_at',
        'release_date_at',
        'game_owned',
        'book_owned',
        'box_owned',
        'progression_status_code',
    ];

    const PROGRESSION_STATUSES = ['Not yet played', 'Tested', 'Playing', 'Finished', '100% Completed'];
    const URGENCY_LEVELS = ['None', 'Low', 'Medium', 'High'];
    const NOT_YET_PLAYED = 1;
    const TESTED = 2;
    const PLAYING = 3;
    const FINISHED = 4;
    const HUNDRED_PERCENT_COMPLETED = 5;

    const GAME_TITLES_PREPEND = [
        'Super', 'The Legend of', 'Crash', 'Dying', 'Stardew', 'Garry\'s', 'Hollow', 'Mirror\'s', 'Team', 'The',
        'Tomb', 'Fallout:', 'Dead', 'Black', 'Cities:', 'Bloody', 'Circle', 'Lego', 'Tom Clancy\'s', 'Astolfo\'s',
        'Donkey Kong:', 'Don\'t', 'Divinity', 'Grand Theft', 'Into', 'Rainbow Six:', 'Age of', 'Rocket', 'League of',
        'Watch', 'Bioshock', 'Plants vs.', 'Mario & Rabbits', 'South Park:', 'Yoshi\'s', 'Sid Meier\'s', 'Sekiro:',
        'Farming', 'Risk of', 'Kerbal', 'Super Smash Brothers:', 'Dota', 'World of', 'Conker\'s', 'Realm of the',
        'Fire Emblem:', 'Russian', 'Super', 'Custom', 'Golden', 'Happy', 'Wario Lands:', 'Metroid', 'Call of',
        'One Piece:', 'Kirby:', 'PlayerUnknown\'s', 'AdVenture', 'Hotel', 'Dr.', 'Luigi\'s', 'Nier', 'Final', 'Bloons',
        'Doki Doki'
    ];
    const GAME_TITLES_APPEND = [
        'Mario', 'Zelda', 'Bandicoot', 'Light', 'Valley', 'Mod', 'Knight', 'Edge', 'Fortress', 'Witcher', 'Raider',
        'New Vegas', 'Island', 'Mesa', 'Skylines', 'Trapland', 'Empires', 'City', 'Fortnite', 'Secret', 'Country',
        'Starve', 'Original Sin', 'Auto', 'Game', 'The Breach', 'Siege', 'Empire', 'League', 'Legends', 'Dogs',
        'Infinite', 'Zombies', 'Kingdom Battle', 'The Stick of Truth', 'The Fractured But Whole', 'Terraria',
        'Civilization', 'Shadows Die Twice', 'Simulator', 'Rain', 'Hentai', 'Space Program', 'Ultimate', '2',
        'Warcraft', 'Bad Fur Day', 'Mad God', 'Fates', 'Fishing', 'Meat Boy', 'Robo', 'Sun', 'Wheels',
        'The Shake Dimension', 'Samus Returns', 'Duty', 'Cthulhu', 'Pirate Warriors', 'Funpack', 'Battlegrounds',
        'Capitalist', 'Mansion', 'Automata', 'Fantasy', 'Tower Defence', 'Literature Club!'
    ];

    /**
     * @return string
     */
    public static function generateTitle(): string
    {
        return static::GAME_TITLES_PREPEND[array_rand(static::GAME_TITLES_PREPEND)] . ' ' .
            static::GAME_TITLES_APPEND[array_rand(static::GAME_TITLES_APPEND)];
    }


    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsToMany
     */
    public function platforms(): BelongsToMany
    {
        return $this->belongsToMany(Platform::class);
    }

    /**
     * @return BelongsToMany
     */
    public function franchises(): BelongsToMany
    {
        return $this->belongsToMany(Franchise::class);
    }

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return BelongsToMany
     */
    public function editions(): BelongsToMany
    {
        return $this->belongsToMany(Edition::class);
    }

}
