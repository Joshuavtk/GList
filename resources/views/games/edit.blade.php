@extends('layouts.master')

@section('content')
    <div class="card card-border-color card-border-color-primary">
        <div class="card-header card-header-divider">Edit game</div>
        <div class="card-body">
            <form method="post" action="{{route('game.update', $game->id)}}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="row">
                    <div class="form-group col">
                        <label class="custom-control custom-checkbox">
                            <input name="game_owned" class="custom-control-input" value="1"
                                   {{ $game->game_owned ? 'checked' : '' }} type="checkbox">
                            <span class="custom-control-label">Game owned</span>
                        </label>
                    </div>
                    <div class="form-group col">
                        <label class="custom-control custom-checkbox">
                            <input name="book_owned" class="custom-control-input" value="1"
                                   {{ $game->book_owned ? 'checked' : '' }} type="checkbox">
                            <span class="custom-control-label">Book owned</span>
                        </label>
                    </div>
                    <div class="form-group col">
                        <label class="custom-control custom-checkbox">
                            <input name="box_owned" class="custom-control-input" value="1"
                                   {{ $game->box_owned ? 'checked' : '' }} type="checkbox">
                            <span class="custom-control-label">Box owned</span>
                        </label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-title" class="col-md-4 col-form-label text-md-right">Title</label>
                    <div class="col-md-6">
                        <input id="game-title" placeholder="Naam..." value="{{$game->title}}"
                               type="text" name="title" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="game-body" class="col-md-4 col-form-label text-md-right">Text</label>
                    <div class="col-md-6">
                        <textarea name="body" id="game-body" placeholder="Body..."
                                  class="form-control">{{$game->body}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="game-urgency" class="col-md-4 col-form-label text-md-right">Urgency</label>
                    <div class="col-md-6">
                        <input value="{{$game->urgency}}" id="game-urgency" placeholder="Number..."
                               type="number" name="urgency" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="progression-status" class="col-md-4 col-form-label text-md-right">Progression
                        status</label>
                    <div class="col-md-6">
                        <select class="form-control" id="progression-status" name="progression_status_code">
                            @foreach($statuses as $key => $status)
                                <option value="{{++$key}}" {{ $game->progression_status_code === $key ? 'selected' : '' }}>{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-score" class="col-md-4 col-form-label text-md-right">Score</label>
                    <div class="col-md-6">
                        <input value="{{$game->score}}" id="game-score" placeholder="Score..."
                               type="number" name="score" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-amount_paid" class="col-md-4 col-form-label text-md-right">Amount paid</label>
                    <div class="col-md-6">
                        <input value="{{$game->amount_paid}}" id="game-amount_paid" placeholder="Score..."
                               type="number" name="amount_paid" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-thumbnail_url" class="col-md-4 col-form-label text-md-right">Thumbnail
                        photo</label>
                    <div class="col-md-6">
                        <input value="{{$game->thumbnail_url}}" id="game-thumbnail_url" placeholder="Url..."
                               type="text" name="thumbnail_url" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-obtained_at" class="col-md-4 col-form-label text-md-right">Obtained at</label>
                    <div class="col-md-6">
                        <input value="{{$game->obtained_at}}" id="game-obtained_at" placeholder="Obtained at..."
                               type="date" name="obtained_at" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="game-finished_at" class="col-md-4 col-form-label text-md-right">Finished at</label>
                    <div class="col-md-6">
                        <input value="{{$game->finished_at}}" id="game-finished_at" placeholder="Date..."
                               type="date" name="finished_at" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="game-release_date_at" class="col-md-4 col-form-label text-md-right">Released at</label>
                    <div class="col-md-6">
                        <input value="{{$game->release_date_at}}" id="game-release_date_at" placeholder="Date..."
                               type="date" name="release_date_at" class="form-control">
                    </div>
                </div>
                <div class="row">

                    <div class="col-4 form-group row pb-0">
                        <label class="col-12">Franchises</label>
                        <div class="col-12 form-check mt-2" id="franchise-selector">
                            @foreach($franchises as $franchise)
                                <label class="custom-control custom-checkbox">
                                    <input name="franchise_id[]" class="custom-control-input"
                                           {{ $game->franchises->find($franchise->id) ? 'checked' : '' }}
                                           value="{{$franchise->id}}" type="checkbox" id="game_{{$franchise->id}}">
                                    <span class="custom-control-label">{{$franchise->title}}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-4 form-group row pb-0">
                        <label class="col-12">Platforms</label>
                        <div class="col-12 form-check mt-2" id="platform-selector">
                            @foreach($platforms as $platform)
                                <label class="custom-control custom-checkbox">
                                    <input name="platform_id[]" class="custom-control-input"
                                           {{ $game->platforms->find($platform->id) ? 'checked' : '' }}
                                           value="{{$platform->id}}" type="checkbox" id="game_{{$platform->id}}">
                                    <span class="custom-control-label">{{$platform->title}}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-4 form-group row pb-0">
                        <label class="col-12">Tags</label>
                        <div class="col-12 form-check mt-2" id="tag-selector">
                            @foreach($tags as $tag)
                                <label class="custom-control custom-checkbox">
                                    <input name="tag_id[]" class="custom-control-input"
                                           {{ $game->tags->find($tag->id) ? 'checked' : '' }}
                                           value="{{$tag->id}}" type="checkbox" id="game_{{$tag->id}}">
                                    <span class="custom-control-label">{{$tag->title}}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col">
                        <p class="text-right">
                            <button type="submit" class="btn btn-space btn-primary">Save</button>
                            <a class="btn btn-space btn-secondary"
                               href="{{back()->getTargetUrl()}}">Cancel</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
