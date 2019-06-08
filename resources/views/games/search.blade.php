@extends('layouts.master')

@section('content')
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-12">
            <div class="card container shadow h-100 py-2">
                <div class="card-body">
                    <h3>Games</h3>
                    @if(isset($search_term))
                        <h4>Search term: {{$search_term}}</h4>
                    @endif
                    <div class="row">
                        @foreach($games as $game)

                            <div class="col-md-4 col-12 col-sm-6 col-xl-3 px-0">
                                <a class="thumbnail card m-2" href="{{ route('game.show', $game->id) }}">
                                    <img class="rounded"
                                         src="{{$game->thumbnail_url ?? 'https://image.shutterstock.com/image-vector/missing-image-vector-illustration-no-260nw-1138069358.jpg'}}">
                                    <div class="position-absolute thumbnail-text rounded-bottom p-2">
                                        <p class="m-0 mb-1 text-light">{{$game->title}}</p>
                                        <p class="m-0 text-lg d-flex">
                                            <i class="mx-1 text-{{$game->game_owned ? 'light' : 'dark'}} fas fa-compact-disc"></i>
                                            <i class="mx-1 text-{{$game->book_owned ? 'light' : 'dark'}} fas fa-book-open"></i>
                                            <i class="mx-1 text-{{$game->box_owned ? 'light' : 'dark'}} fas fa-box"></i>
                                            <span class="ml-auto urgency-{{ (isset($game::URGENCY_LEVELS[$game->urgency])) ? $game::URGENCY_LEVELS[$game->urgency] : 'None'}}">
                                                <i class="fas fa-pastafarianism"></i>
                                            </span>
                                        </p>
                                    </div>
                                </a>
                            </div>

                        @endforeach
                    </div>
                    <div class="text-center">
                        {{ $games->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
