@extends('layouts.master')

@section('content')
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-12">
            <div class="card container shadow h-100 py-2">
                <div class="card-body">
                    <h3>Manage Tags</h3>
                    <table class="table">
                        <tr>
                            <th>Tag</th>
                            <th>Category</th>
                            <th></th>
                        </tr>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{$tag->title}}</td>
                                <td>{{App\Tag::CATEGORIES[$tag->category]}}</td>
                                <td><a href="{{route('tag.edit', $tag)}}">Edit</a></td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
