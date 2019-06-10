@extends('layouts.master')

@section('content')
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-12">
            <div class="card container shadow h-100 py-2">
                <div class="card-body">
                    <div class="row" id="filters">
                        <h3 class="col-12 text-center ">Filters</h3>
                        <div class="form-group col-md-3">
                            <label for="game-platform" class="col-md-12 col-form-label text-md-center">Platforms</label>
                            <div class="col-md-12">
                                <select id="game-platform" name="platform_id[]" class="selectpicker" multiple
                                        data-show-subtext="true" data-live-search="true">
                                    @foreach($platforms as $platform)
                                        <option value="{{$platform->id}}">{{$platform->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="game-franchise"
                                   class="col-md-12 col-form-label text-md-center">Franchises</label>
                            <div class="col-md-12">
                                <select id="game-franchise" name="franchise_id[]" class="selectpicker" multiple
                                        data-show-subtext="true" data-live-search="true">
                                    @foreach($franchises as $franchise)
                                        <option value="{{$franchise->id}}">{{$franchise->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="game-tag" class="col-md-12 col-form-label text-md-center">Info (Tags)</label>
                            <div class="col-md-12">
                                <select id="game-tag" name="tag_id[]" class="selectpicker" multiple
                                        data-show-subtext="true"
                                        data-live-search="true">
                                    @foreach($notes as $note)
                                        <option value="{{$note->id}}">{{$note->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="game-edition" class="col-md-12 col-form-label text-md-center">Editions</label>
                            <div class="col-md-12">
                                <select id="game-edition" name="edition_id[]" class="selectpicker" multiple
                                        data-show-subtext="true" data-live-search="true">
                                    @foreach($editions as $edition)
                                        <option value="{{$edition->id}}">{{$edition->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <table id="data_table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Franchises</th>
                            <th>Platforms</th>
                            <th>Notes</th>
                            <th>Editions</th>
                            <th>Title</th>
                            <th>Urgency</th>
                            <th>Owned</th>
                            <th>Price est.</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($games as $game)
                            <tr>
                                <td class="p-0 text-center">
                                    <a href="{{route('game.show', $game)}}">
                                        <img class="table_thumbnail" alt=""
                                             src="{{$game->thumbnail_url ?? 'https://image.shutterstock.com/image-vector/missing-image-vector-illustration-no-260nw-1138069358.jpg'}}">
                                    </a>
                                </td>
                                <td data-search="@foreach($game->tags->where('category', '=', 0) as $franchise):{{$franchise->id}},@endforeach">
                                </td>
                                <td data-search="@foreach($game->tags->where('category', '=', 1) as $platform):{{$platform->id}},@endforeach">
                                </td>
                                <td data-search="@foreach($game->tags->where('category', '=', 2) as $note):{{$note->id}},@endforeach">
                                </td>
                                <td data-search="@foreach($game->tags->where('category', '=', 3) as $edition):{{$edition->id}},@endforeach">
                                </td>
                                <td data-order="{{$game->title}}">
                                    <a href="{{route('game.show', $game)}}">{{$game->title}}
                                    </a>
                                </td>
                                <td data-order="{{$game->urgency}}">
                                    <span class="ml-auto urgency-{{ (isset($game::URGENCY_LEVELS[$game->urgency])) ? $game::URGENCY_LEVELS[$game->urgency] : 'None'}}">
                                        <i class="fas fa-pastafarianism"></i>
                                    </span></td>
                                <td data-order="{{$game->game_owned + $game->book_owned + $game->box_owned}}">
                                    <i class="mx-1 text-{{$game->game_owned ? 'light' : 'dark'}} fas fa-compact-disc"></i>
                                    <i class="mx-1 text-{{$game->book_owned ? 'light' : 'dark'}} fas fa-book-open"></i>
                                    <i class="mx-1 text-{{$game->box_owned ? 'light' : 'dark'}} fas fa-box"></i>
                                </td>
                                <td>
                                    €{{$game->price_estimate}}
                                </td>
                                {{--<td>{{ (isset(App\Game::PROGRESSION_STATUSES[$game->progression_status_code])) ? App\Game::PROGRESSION_STATUSES[$game->progression_status_code] : '?'}}</td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{--                    <h3>Games</h3>--}}
                    {{--                    @if(isset($search_term))--}}
                    {{--                        <h4>Search term: {{$search_term}}</h4>--}}
                    {{--                    @endif--}}
                    {{--                    <div class="row">--}}
                    {{--                        @foreach($games as $game)--}}

                    {{--                            <div class="col-md-4 col-12 col-sm-6 col-xl-3 px-0">--}}
                    {{--                                <a class="thumbnail card m-2" href="{{ route('game.show', $game->id) }}">--}}
                    {{--                                    <img class="rounded"--}}
                    {{--                                         src="{{$game->thumbnail_url ?? 'https://image.shutterstock.com/image-vector/missing-image-vector-illustration-no-260nw-1138069358.jpg'}}">--}}
                    {{--                                    <div class="position-absolute thumbnail-text rounded-bottom p-2">--}}
                    {{--                                        <p class="m-0 mb-1 text-light">{{$game->title}}</p>--}}
                    {{--                                        <p class="m-0 text-lg d-flex">--}}
                    {{--                                            <i class="mx-1 text-{{$game->game_owned ? 'light' : 'dark'}} fas fa-compact-disc"></i>--}}
                    {{--                                            <i class="mx-1 text-{{$game->book_owned ? 'light' : 'dark'}} fas fa-book-open"></i>--}}
                    {{--                                            <i class="mx-1 text-{{$game->box_owned ? 'light' : 'dark'}} fas fa-box"></i>--}}
                    {{--                                            <span class="ml-auto urgency-{{ (isset($game::URGENCY_LEVELS[$game->urgency])) ? $game::URGENCY_LEVELS[$game->urgency] : 'None'}}">--}}
                    {{--                                                <i class="fas fa-pastafarianism"></i>--}}
                    {{--                                            </span>--}}
                    {{--                                        </p>--}}
                    {{--                                    </div>--}}
                    {{--                                </a>--}}
                    {{--                            </div>--}}

                    {{--                        @endforeach--}}
                    {{--                    </div>--}}
                    {{--                    <div class="text-center">--}}
                    {{--                        {{ $games->links() }}--}}
                    {{--                    </div>--}}

                </div>
            </div>
        </div>
    </div>

@endsection
