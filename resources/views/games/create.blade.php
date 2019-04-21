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
                        <input id="game-title" placeholder="Naam..."
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
                        <input id="game-urgency" placeholder="Number..."
                               type="number" name="urgency" class="form-control">
                    </div>
                </div>
                {{--                <div class="form-group row">--}}
                {{--                    <label for="game-favorite" class="col-md-4 col-form-label text-md-right">Favorite</label>--}}
                {{--                    <div class="col-md-6">--}}
                {{--                        <input id="game-favorite" type="checkbox" name="favorite" class="form-control">--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="form-group row">
                    <label for="game-score" class="col-md-4 col-form-label text-md-right">Score</label>
                    <div class="col-md-6">
                        <input id="game-score" placeholder="Score..."
                               type="number" name="score" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-sales_amount" class="col-md-4 col-form-label text-md-right">Amount sold</label>
                    <div class="col-md-6">
                        <input id="game-sales_amount" placeholder="Score..."
                               type="number" name="sales_amount" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game-thumbnail_url" class="col-md-4 col-form-label text-md-right">Thumbnail
                        photo</label>
                    <div class="col-md-6">
                        <input id="game-sales_amount" placeholder="Url..."
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
                <div class="row">

                    <div class="col-4 form-group row pb-0">
                        <label class="col-12">Franchises</label>
                        <div class="col-12 form-check mt-2" id="franchise-selector">
                            @foreach($franchises as $franchise)
                                <label class="custom-control custom-checkbox">
                                    <input name="franchise_id[]" class="custom-control-input"
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
