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
                        <p>
                            {{$movie->overview}}
                        </p>
                        <p>
                            {{$movie->release_date}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @if($threads) 
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col">Title</th>
                        <th class="col">Created At</th>
                        <th class="col">Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($threads as $thread)
                        <tr>
                            <td>
                                <a href={{'/threads/'.$thread->id}}>
                                    {{$thread->title}}
                                </a>
                            </td>
                            <td>{{$thread->created_at}}</td>
                            <td>{{$thread->updated_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        @endif
    </div>
@endsection
