@extends('layouts.master');
@section('content')
    <h1>Search Page</h1>
    <table>
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