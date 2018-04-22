@extends('layouts.master')

@section('content')
    <h1>{{$movie->title}}</h1>
    <p>
        {{$movie->overview}}
    </p>
    <p>
        {{$movie->release_date}}
    </p>
    <img src={{'http://image.tmdb.org/t/p/w185' . $movie->poster_path}} alt="">
@endsection
