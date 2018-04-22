<?php

namespace App\Http\Controllers;

use Config;
use Illuminate\Http\Request;
// use Tmdb\ApiToken;
use Tmdb\Client;

class SearchController extends Controller
{
    public function index(Request $request, Client $tmdb) {
        $term = $request->input('term');
        $response = $tmdb->getSearchApi()->searchMovies($term);
        $movies = $response['results'];
        dump($movies);
        return view('search.index')
            ->with(['movies'=>$movies]);
    }
}
