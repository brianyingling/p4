<?php

namespace App\Http\Controllers;

use Config;
use Illuminate\Http\Request;
use Tmdb\ApiToken;
use Tmdb\Client;

class SearchController extends Controller
{
    public function index() {
        $token = new ApiToken(Config::get('app.tmdb_token'));
        $client = new Client($token);
        $response = $client->getSearchApi()->searchMovies('batman');
        $movies = $response['results'];
        dump($movies);
        return view('search.index')
            ->with(['movies'=>$movies]);
    }
}
