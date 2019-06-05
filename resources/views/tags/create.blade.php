@extends('layouts.master')

@section('content')
    <div class="card card-border-color card-border-color-primary">
        <div class="card-header card-header-divider">Create Tag</div>
        <div class="card-body">
            <form method="post" action="{{route('tag.store')}}">
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
                    <label for="category" class="col-md-4 col-form-label text-md-right">
                        Category
                    </label>
                    <div class="col-md-6">
                        <select class="form-control" id="category" name="category">
                            @foreach($categories as $key => $category)
                                <option value="{{++$key}}">{{$category}}</option>
                            @endforeach
                        </select>
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
