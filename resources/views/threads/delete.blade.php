@extends('layouts.master');

@section('content')
    <h1>Are you sure you wish to delete this thread?</h1>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-8">
                    <h5 class="thread-title">
                        {{$thread->title}}
                    </h5>
                </div>
                <div class="col-sm-4 text-right small">
                    <div class="thread-user">
                        <span>Written by </span>
                        {{$thread->user->name}}
                        <span> on </span>
                        {{$thread->created_at}}
                    </div>
                    <div class="thread-user-actions">
                        @if(Auth::check())
                            <span class="edit">
                            <a href={{'/threads/'.$thread->id.'/edit'}}>Edit</a> | 
                            <a href="">Delete</a>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="thread-text">
                {{$thread->text}}
            </div>
        </div>
    </div>
    <form action="/threads/{{$thread->id}}" method='POST'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type="submit" class='btn btn-danger' value='Delete'>
    </form> 
    
@endsection