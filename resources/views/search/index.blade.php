@extends('layouts.master');

@section('content')
    <h1>Search Page</h1>
    @foreach($results as $key => $result)
        <div>
            {{$result['title']}}
        </div>
    @endforeach
@endsection