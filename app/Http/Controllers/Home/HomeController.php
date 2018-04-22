<?php

namespace App\Http\Controllers\Home;

use Config;
use App\Http\Controllers\Controller;
use Tmdb\Repository\MovieRepository;
use Tmdb\ApiToken;
use Tmdb\Client;

class HomeController extends Controller {
    public function index() {
        $tokenString = Config::get('app.tmdb_token');
        $token = new \Tmdb\ApiToken($tokenString);
        $client = new \Tmdb\Client($token);
        // dump($tokenString);
        // $movie = $client->getMoviesApi()->getMovie(550);
        $repository = new MovieRepository($client);
        $movie = $repository->load(87421);
        // dump($movie->getTitle());

        $result = $client->getSearchApi()->searchMovies('batman');

        // dump($result['page']);
        return view('home.index')
            ->with(['results' => $result['results']]);
    }
}