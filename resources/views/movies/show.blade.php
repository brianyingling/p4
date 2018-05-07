@extends('layouts.master')

@section('content')
    <div id="movie-details">
        <div class="card">
            <div class="row">
                <div class="col-sm-2">
                    <img src={{'http://image.tmdb.org/t/p/w185' . $movie->poster_path}} alt="">
                </div>
                <div class="col-sm-10">
                    <div class="movie-info">
                        <h1>{{$movie->title}}</h1>
                        @if(isset($movie->release_date))
                            <p class="release-date">
                                <em>Released {{(new \Moment\Moment($movie->release_date))->format('F dS Y')}}</em>
                            </p>
                        @endif
                        <p>
                            {{$movie->overview}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <a href="/movie/{{$movie->id}}/threads/create" class='btn btn-link'>
                Create a New Thread
            </a>
        </div>
        @if(isset($threads) && count($threads))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col w-25">Title</th>
                        <th class="col w-25">User</th>
                        <th class="col w-25">Created At</th>
                        <th class="col w-25">Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($threads as $thread)
                        <tr>
                            <td><a href='{{'/threads/'.$thread->id}}'>{{$thread->title}}</a></td>
                            <td>{{$thread->user->name}}</td>
                            <td>{{$thread->created_at}}</td>
                            <td>{{$thread->updated_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
