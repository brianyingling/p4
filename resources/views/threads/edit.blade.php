@extends('layouts.master')

@section('content')
    <h1> Edit Thread</h1>
    <form action='/threads/{{$thread->id}}' method='POST'>
        {{ method_field('put') }}
        {{ csrf_field() }}

        <label for="title">Title</label>
        <div class="input-group">
            <input type="text" name="title" id="title" class='form-control' value='{{old('title', $thread->title)}}'>
        </div>
        
        <label for="text">Text:</label>
        <div class="input-group">
            <textarea name="text" id="text" class="form-control">{{old('text', $thread->text)}}</textarea>
        </div>
        <input type="submit" value="Save Changes" class="btn btn-primary">

        <div class="last-updated">
            <em>Last updated: {{$thread->last_updated}}</em>
        </div>

        <div class="created">
            <em>Created: {{$thread->created_at}}</em>
        </div>
    </form>
@endsection