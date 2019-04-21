@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$game->title}}</h1>
        <div>
            <a href="{{ route('game.edit', $game->id) }}" class="btn btn-success"><span class="fas fa-plus"></span> Add to list</a>
            <a href="{{ route('game.edit', $game->id) }}" class="btn btn-primary"><span class="fas fa-edit"></span> Edit</a>
            <a href="{{ route('game.edit', $game->id) }}" class="btn btn-danger"><span class="fas fa-trash"></span> Delete</a>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6 col-xl-8 col-12">
            <div class="row ">

            @if(count($game->franchises))
                <!-- Earnings (Monthly) Card Example -->
                    <div class="col-12 mb-4 col-xl-6">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Franchises
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            @foreach($game->franchises as $franchise)
                                                <h2 class="badge badge-primary">{{$franchise->title}}</h2>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-pallet fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endif

            @if(count($game->platforms))
                <!-- Earnings (Monthly) Card Example -->
                    <div class="col-12 mb-4 col-xl-6">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Platforms
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            @foreach($game->platforms as $platform)
                                                <h2 class="badge badge-success">{{$platform->title}}</h2>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fab fa-usb fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endif

            @if(count($game->tags))
                <!-- Earnings (Monthly) Card Example -->
                    <div class="col-12 mb-4 col-xl-6">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Tags
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            @foreach($game->tags as $tag)
                                                <h2 class="badge badge-danger">{{$tag->title}}</h2>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-tags fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-md-6 col-xl-4 col-12">

            <div class="card w-100 mb-4">
                <div class="card-body text-center">
                    <img class="w-100" src="{{$game->thumbnail_url}}" alt="" style="max-height: 400px;">
                </div>
            </div>

        </div>
    </div>

    <div class="row">

        <div class="col-12">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Description / Notes
                </div>
                <div class="card-body">
                    {{$game->body}}
                    <hr>
                    {{$game->score}}
                    {{$game->urgency}}
                    {{$game->favorite}}
                    {{$game->obtained_at}}
                    {{$game->finished_at}}
                    {{$game->release_date_at}}
                    {{$game->sales_amount}}

                </div>
            </div>

        </div>

    </div>


@endsection
