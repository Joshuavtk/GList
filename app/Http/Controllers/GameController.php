<?php

namespace App\Http\Controllers;

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
        $franchises = auth()->user()->tags()->where('category', '=', 0)->get();
        $platforms = auth()->user()->tags()->where('category', '=', 1)->get();
        $notes = auth()->user()->tags()->where('category', '=', 2)->get();
        $editions = auth()->user()->tags()->where('category', '=', 3)->get();

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
        $tags = [];

        if ($request->franchise_id) {
            $tags = array_merge($tags, $request->franchise_id);
        }
        if ($request->tag_id) {
            $tags = array_merge($tags, $request->tag_id);
        }
        if ($request->platform_id) {
            $tags = array_merge($tags, $request->platform_id);
        }
        if ($request->edition_id) {
            $tags = array_merge($tags, $request->edition_id);
        }

        $game->tags()->sync($tags);

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
        $franchises = $game->tags()->where('category', '=', 0)->get();
        $platforms = $game->tags()->where('category', '=', 1)->get();
        $notes = $game->tags()->where('category', '=', 2)->get();
        $editions = $game->tags()->where('category', '=', 3)->get();
        return view('games.show')
            ->with(compact(
                'game',
                'franchises',
                'platforms',
                'notes',
                'editions'
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
        $franchises = auth()->user()->tags()->where('category', '=', 0)->get();
        $platforms = auth()->user()->tags()->where('category', '=', 1)->get();
        $notes = auth()->user()->tags()->where('category', '=', 2)->get();
        $editions = auth()->user()->tags()->where('category', '=', 3)->get();
        $statuses = Game::PROGRESSION_STATUSES;

        return view('games.edit')
            ->with(compact(
                'game',
                'franchises',
                'platforms',
                'notes',
                'editions',
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

        $tags = [];

        if ($request->franchise_id) {
            $tags = array_merge($tags, $request->franchise_id);
        }
        if ($request->tag_id) {
            $tags = array_merge($tags, $request->tag_id);
        }
        if ($request->platform_id) {
            $tags = array_merge($tags, $request->platform_id);
        }
        if ($request->edition_id) {
            $tags = array_merge($tags, $request->edition_id);
        }

        $game->tags()->sync($tags);

        $game->update($data);

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
