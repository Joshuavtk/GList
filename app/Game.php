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
 * @property string sales_amount
 * @property string urgency
 * @property string favorite
 * @property string score
 * @property string obtained_at
 * @property string finished_at
 * @property string release_date_at
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
        'sales_amount',
        'obtained_at',
        'finished_at',
        'release_date_at',
    ];

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
