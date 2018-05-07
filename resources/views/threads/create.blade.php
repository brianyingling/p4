@extends('layouts.master')

@section('content')
    <h1><em>{{$movie_title}}</em></h1>
    <div class="card">
    <div class="card-body">
    <h2>New Thread</h2>
    <form action='/threads' method='POST'>
        {{ csrf_field() }}

        <label for="title">Title</label>
        <div class="input-group">
            <input type="text" name="title" id="title" class='form-control' value='{{old('title', $thread->title)}}'>
        </div>
        
        <label for="text">Text:</label>
        <div class="input-group">
            <textarea name="text" id="text" class="form-control">{{old('text', $thread->text)}}</textarea>
        </div>
        <input type="hidden" name="movie_id" id="movie_id" value='{{$movie_id}}'>

        <input type="submit" value="Create Thread" class="btn btn-primary">

        @if($thread->last_updated)
            <div class="last-updated">
                <em>Last updated: {{$thread->last_updated}}</em>
            </div>
        @endif

        @if($thread->created_at)
            <div class="created">
                <em>Created: {{$thread->created_at}}</em>
            </div>
        @endif
    </form>
    </div>
    </div>
@endsection
