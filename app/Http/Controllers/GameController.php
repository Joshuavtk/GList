<?php

namespace App\Http\Controllers;

use App\Edition;
use App\Franchise;
use App\Game;
use App\Http\Requests\GameStoreRequest;
use App\Http\Requests\GameUpdateRequest;
use App\Platform;
use App\Tag;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

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
        $games = auth()->user()->games()->paginate(16);

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
        $franchises = Tag::all()->where('category', '=', 0);
        $platforms = Tag::all()->where('category', '=', 1);
        $notes = Tag::all()->where('category', '=', 2);
        $editions = Tag::all()->where('category', '=', 3);

        return view('games.create')
            ->with(compact(
                'franchises',
                'platforms',
                'notes',
                'editions'
            ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GameStoreRequest $request
     * @return Response
     */
    public function store(GameStoreRequest $request)
    {
        /** @var Game $game */
        $game = auth()->user()->games()->create($request->toArray());

        $game->franchises()->sync($request->franchise_id);
        $game->tags()->sync($request->tag_id);
        $game->platforms()->sync($request->platform_id);
        $game->editions()->sync($request->edition_id);

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
        $statuses = Game::PROGRESSION_STATUSES;

        return view('games.edit')
            ->with(compact(
                'game',
                'franchises',
                'platforms',
                'tags',
                'statuses'
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
        // Value of $request->is_expired is either 1 or undefined so we change undefined to 0 here
        $game_owned = $request->game_owned || 0;
        $book_owned = $request->book_owned || 0;
        $box_owned = $request->box_owned || 0;

        if ($game_owned && $book_owned && $box_owned) {
            $data = $request->toArray();
        } else {
            // Add an is_expired row to the request when the value is 0
            $data = array_merge($request->toArray(), [
                'game_owned' => $game_owned,
                'book_owned' => $book_owned,
                'box_owned' => $box_owned,
            ]);
        }

        $game->update($data);

        $game->franchises()->sync($request->franchise_id);
        $game->tags()->sync($request->tag_id);
        $game->platforms()->sync($request->platform_id);
        $game->editions()->sync($request->edition_id);
        return redirect(route('game.show', $game->id));
    }

    /**
     * @param Request $search_input
     * @return Factory|View
     */
    public function search(Request $search_input)
    {
        $search_term = $search_input->search_input;

        $games = auth()->user()->games()->where('title', 'LIKE', "%$search_term%")->paginate(16);

        $games->withPath("?search_input=$search_term");

        return view('games.index')->with(compact('games', 'search_term'));
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
