@extends('layouts.master')
@section('content')
    <h2>Search Results</h2>
    <table id='search-results'>
            <tr>
                <td>id</td>
                <td>title</td>
                <td>Release Date</td>
            </tr>
                @foreach($movies as $movie)
                    <tr>
                        <td>{{$movie['id']}}</td>
                        <td>{{$movie['title']}}</td>
                        <td>{{$movie['release_date']}}</td>
                    </tr>
                @endforeach
        </table>
@endsection