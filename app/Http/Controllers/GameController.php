<?php

namespace App\Http\Controllers;

use App\Franchise;
use App\Game;
use App\Http\Requests\GameStoreRequest;
use App\Http\Requests\GameUpdateRequest;
use App\Platform;
use App\Tag;
use Illuminate\Http\Response;

/**
 * Class GameController
 * @package App\Http\Controllers
 */
class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $games = Game::all();

        return view('games.index')
            ->with(compact(
                'games'
            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $franchises = Franchise::all();
        $platforms = Platform::all(['id', 'title']);
        $tags = Tag::all();

        return view('games.create')
            ->with(compact(
                'franchises',
                'platforms',
                'tags'
            ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(GameStoreRequest $request)
    {
        $game = Game::create($request->toArray());
        return redirect(route('game.show', $game->id));
    }

    /**
     * Display the specified resource.
     *
     * @param Game $game
     * @return Response
     */
    public function show(Game $game)
    {
        return view('games.show')
            ->with(compact(
                'game'
            ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Game $game
     * @return Response
     */
    public function edit(Game $game)
    {
        $franchises = Franchise::all();
        $platforms = Platform::all(['id', 'title']);
        $tags = Tag::all();

        return view('games.edit')
            ->with(compact(
                'game',
                'franchises',
                'platforms',
                'tags'
            ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GameUpdateRequest $request
     * @param Game $game
     * @return Response
     */
    public function update(GameUpdateRequest $request, Game $game)
    {
        $game->update($request->toArray());

        $franchises = Franchise::all();

        if (empty($newFranchises = $request->franchise_id)) {
            $newFranchises = [''];
        }

        $platforms = Platform::all();

        if (empty($newPlatforms = $request->platform_id)) {
            $newPlatforms = [''];
        }

        $tags = Tag::all();

        if (empty($newTags = $request->tag_id)) {
            $newTags = [''];
        }

        foreach ($franchises as $franchise) {
            if (in_array($franchise->id, $newFranchises)) {
                if (!$game->franchises->find($franchise->id)) {
                    $game->franchises()->toggle($franchise);
                }
            } elseif ($game->franchises->find($franchise->id)) {
                $game->franchises()->toggle($franchise->id);
            }
        }

        foreach ($platforms as $platform) {
            if (in_array($platform->id, $newPlatforms)) {
                if (!$game->platforms->find($platform->id)) {
                    $game->platforms()->toggle($platform);
                }
            } elseif ($game->platforms->find($platform->id)) {
                $game->platforms()->toggle($platform->id);
            }
        }

        foreach ($tags as $tag) {
            if (in_array($tag->id, $newTags)) {
                if (!$game->tags->find($tag->id)) {
                    $game->tags()->toggle($tag);
                }
            } elseif ($game->tags->find($tag->id)) {
                $game->tags()->toggle($tag->id);
            }
        }

        return redirect(route('game.show', $game->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Game $game
     * @return Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
