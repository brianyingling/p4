@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="row">
            <div class="col-sm-2">
                <a href="/movie/{{$movie->tmdb_id}}">
                    <img src={{'http://image.tmdb.org/t/p/w185' . $movie->poster_path}} alt="">
                </a>
            </div>
            <div class="col-sm-10">
                <div class="movie-info">
                    <h1>{{$movie->title}}</h1>
                    <p>{{$movie->release_date}}</p>
                    <div class="text-right">
                        <a href="" class="btn btn-link">
                            Add a comment
                        </a>
                    </div>
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
                                            <a href={{'/threads/'.$thread->id.'/delete'}}>Delete</a>
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
                </div>
            </div>
        </div>
    </div>
@endsection