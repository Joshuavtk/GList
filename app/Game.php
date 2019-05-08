<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Game
 * @package App
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
        'progression_status_code',
    ];

    const PROGRESSION_STATUSES = ['Not yet played', 'Tested', 'Playing', 'Finished', '100% Completed'];
    const NOT_YET_PLAYED = 1;
    const TESTED = 2;
    const PLAYING = 3;
    const FINISHED = 4;
    const HUNDRED_PERCENT_COMPLETED = 5;

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

}
