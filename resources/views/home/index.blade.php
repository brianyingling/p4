@extends('layouts.master')

@section('content')
    <div id="top-comments" class="card">
        <div class="card-body">
            <div class="card-title">Movies with Top Comments</div>
            <div class="card-text">
                <ul>
                    @foreach($results as $result)
                        <li class="title">
                            <a href={{'/movie/'.$result->tmdb_id}}>{{$result->title}}</a>
                            <div class="small">
                                {{$result->count}}
                                @if($result->count === 1)
                                    comment
                                @else
                                    comments
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
