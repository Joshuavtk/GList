@extends('layouts.master')

@section('content')
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-12">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <a class="btn btn-primary mb-2" href="{{route('game.create')}}"><span class="fas fa-plus"></span> Create new game</a><br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Score</th>
                            <th scope="col">Urgency</th>
                            <th scope="col">Favorite</th>
                            <th scope="col">Obtained at</th>
                            <th scope="col">Finished at</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($games as $game)
                            <tr>
                                <td>{{$game->title}}</td>
                                <td>{{$game->score}}</td>
                                <td>{{$game->urgency}}</td>
                                <td>{{$game->favorite ? 'yes' : 'no'}}</td>
                                <td>{{$game->obtained_at}}</td>
                                <td>{{$game->finished_at}}</td>
                                <td>
                                    <a href="{{ route('game.show', $game->id) }}">Show</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
