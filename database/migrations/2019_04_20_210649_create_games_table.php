<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateGamesTable
 */
class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('thumbnail_url');
            $table->text('body')->nullable();
            $table->integer('amount_paid')->nullable();

            $table->boolean('game_owned')->nullable();
            $table->boolean('book_owned')->nullable();
            $table->boolean('box_owned')->nullable();

            $table->integer('progression_status_code')->nullable();
            $table->integer('urgency')->nullable();
            $table->boolean('favorite')->nullable();
            $table->integer('score')->nullable();

            $table->string('price_estimate')->nullable();

            $table->date('release_date_at')->nullable();

            $table->date('obtained_at')->nullable();
            $table->date('finished_at')->nullable();

            $table->timestamps();
        });

        Schema::create('game_platform', function (Blueprint $table) {
            $table->integer('platform_id');
            $table->integer('game_id');
            $table->primary(['platform_id', 'game_id']);
        });

        Schema::create('game_tag', function (Blueprint $table) {
            $table->integer('tag_id');
            $table->integer('game_id');
            $table->primary(['tag_id', 'game_id']);
        });

        Schema::create('franchise_game', function (Blueprint $table) {
            $table->integer('franchise_id');
            $table->integer('game_id');
            $table->primary(['franchise_id', 'game_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
