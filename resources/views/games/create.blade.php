@extends('layouts.master')

@section('content')
    <div class="card card-border-color card-border-color-primary">
        <div class="card-header card-header-divider">Create entry</div>
        <div class="card-body">
            <form method="post" action="{{route('game.store')}}">
                {{ method_field('POST') }}
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="game-title" class="col-md-4 col-form-label text-md-right">Title</label>
                    <div class="col-md-6">
                        <input id="game-title" placeholder="E.g.: {{App\Game::generateTitle()}}" required
                               type="text" name="title" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="game-body" class="col-md-4 col-form-label text-md-right">Text</label>
                    <div class="col-md-6">
                        <textarea name="body" id="game-body" placeholder="Body..."
                                  class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-urgency" class="col-md-4 col-form-label text-md-right">Urgency</label>
                    <div class="col-md-6">
                        <select id="game-urgency" class="custom-select" name="urgency">
                            @foreach(App\Game::URGENCY_LEVELS as $key => $level)
                                <option value="{{$key}}">{{$level}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-score" class="col-md-4 col-form-label text-md-right">Score</label>
                    <div class="col-md-6">
                        <input id="game-score" placeholder="Score..." min="0" max="10" step="1"
                               type="number" name="score" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-price_estimate" class="col-md-4 col-form-label text-md-right">Price
                        estimated</label>
                    <div class="col-md-6">
                        <input id="game-price_estimate" placeholder="Price estimated..." min="0" step="0.01"
                               type="number" name="price_estimate" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-amount_paid" class="col-md-4 col-form-label text-md-right">Amount paid</label>
                    <div class="col-md-6">
                        <input id="game-amount_paid" placeholder="Amount paid..." min="0" step="0.01"
                               type="number" name="amount_paid" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-thumbnail_url" class="col-md-4 col-form-label text-md-right">Thumbnail
                        photo</label>
                    <div class="col-md-6">
                        <input id="game-thumbnail_url" placeholder="Url..."
                               type="text" name="thumbnail_url" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-obtained_at" class="col-md-4 col-form-label text-md-right">Obtained at</label>
                    <div class="col-md-6">
                        <input id="game-obtained_at" placeholder="Obtained at..."
                               type="date" name="obtained_at" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="game-finished_at" class="col-md-4 col-form-label text-md-right">Finished at</label>
                    <div class="col-md-6">
                        <input id="game-finished_at" placeholder="Date..."
                               type="date" name="finished_at" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="game-release_date_at" class="col-md-4 col-form-label text-md-right">Released at</label>
                    <div class="col-md-6">
                        <input id="game-release_date_at" placeholder="Date..."
                               type="date" name="release_date_at" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-progression_status_code" class="col-md-4 col-form-label text-md-right">Game
                        progression</label>
                    <div class="col-md-6">
                        <select id="game-progression_status_code" class="custom-select" name="progression_status_code">
                            @foreach(App\Game::PROGRESSION_STATUSES as $key => $status)
                                <option value="{{++$key}}">{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="custom-control custom-checkbox mx-auto">
                        <input name="game_owned" class="custom-control-input" value="1" type="checkbox">
                        <span class="custom-control-label">Game owned</span>
                    </label>
                </div>

                <div class="form-group row">
                    <label class="custom-control custom-checkbox mx-auto">
                        <input name="book_owned" class="custom-control-input" value="1" type="checkbox">
                        <span class="custom-control-label">Book owned</span>
                    </label>
                </div>

                <div class="form-group row">
                    <label class="custom-control custom-checkbox mx-auto">
                        <input name="box_owned" class="custom-control-input" value="1" type="checkbox">
                        <span class="custom-control-label">Box owned</span>
                    </label>
                </div>

                <div class="form-group row">
                    <label for="game-platform" class="col-md-4 col-form-label text-md-right">Platforms</label>
                    <div class="col-md-6">
                        <select id="game-platform" name="platform_id[]" class="selectpicker" multiple
                                data-show-subtext="true" data-live-search="true">
                            @foreach($platforms as $platform)
                                <option value="{{$platform->id}}">{{$platform->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-franchise" class="col-md-4 col-form-label text-md-right">Franchises</label>
                    <div class="col-md-6">
                        <select id="game-franchise" name="franchise_id[]" class="selectpicker" multiple
                                data-show-subtext="true" data-live-search="true">
                            @foreach($franchises as $franchise)
                                <option value="{{$franchise->id}}">{{$franchise->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-tag" class="col-md-4 col-form-label text-md-right">Info (Tags)</label>
                    <div class="col-md-6">
                        <select id="game-tag" name="tag_id[]" class="selectpicker" multiple data-show-subtext="true"
                                data-live-search="true">
                            @foreach($notes as $note)
                                <option value="{{$note->id}}">{{$note->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-edition" class="col-md-4 col-form-label text-md-right">Editions</label>
                    <div class="col-md-6">
                        <select id="game-edition" name="edition_id[]" class="selectpicker" multiple
                                data-show-subtext="true" data-live-search="true">
                            @foreach($editions as $edition)
                                <option value="{{$edition->id}}">{{$edition->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @if (count($errors))
                    <div class="card bg-warning">
                        <div class="card-body">
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="row pt-3">
                    <div class="col">
                        <p class="text-right">
                            <button type="submit" class="btn btn-space btn-primary">Create game</button>
                            <a class="btn btn-space btn-secondary"
                               href="{{back()->getTargetUrl()}}">Annuleer</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
