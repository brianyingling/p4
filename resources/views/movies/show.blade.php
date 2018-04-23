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
    </div>
@endsection
