<?php

namespace App\Http\Controllers;

use Config;
use Illuminate\Http\Request;
use Tmdb\ApiToken;
use Tmdb\Client;

class SearchController extends Controller
{
    public function index(Request $request) {
        $term = $request->input('term');
        dump($term);
        $token = new ApiToken(Config::get('app.tmdb_token'));
        $client = new Client($token);
        $response = $client->getSearchApi()->searchMovies($term);
        $movies = $response['results'];
        dump($movies);
        return view('search.index')
            ->with(['movies'=>$movies]);
    }
}
