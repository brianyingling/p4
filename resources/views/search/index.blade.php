@extends('layouts.master')
@section('content')
    <h3>
        Viewing {{$page_results_start_count}} - {{$page_results_end_count}} 
        of {{$total_results}} results
    </h3>
    <table id='search-results' class='table'>
        <thead class='thead-light'>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>Release Date</th>
            </tr>
        </thead>
        <tbody>
                @foreach($movies as $movie)
                    <tr>
                        <td>{{$movie['id']}}</td>
                        <td>
                            <a href={{'/movie/'.$movie['id']}}>
                                {{$movie['title']}}
                            </a>
                        </td>
                        <td>{{$movie['release_date']}}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>
    
    <div class="row">
        <div class="col-sm-2">
            @if($prev_page)
                <a href={{'/search?term='.$term.'&page='.$prev_page}}>
                    Prev
                </a>
            @endIf
        </div>
        <div class="col-sm-8">&nbsp;</div>
        <div class="col-sm-2">
            @if($next_page)
            <a href={{'/search?term='.$term.'&page='.$next_page}}>
                Next
            </a>
            @endIf
        </div>
    </div>
@endsection