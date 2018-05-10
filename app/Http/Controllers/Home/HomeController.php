<?php

namespace App\Http\Controllers\Home;

use Config;
use App\Http\Controllers\Controller;
use Tmdb\Repository\MovieRepository;
use Tmdb\ApiToken;
use Tmdb\Client;

class HomeController extends Controller {
    public function index() {
        $query = 'select count(*) as count, movies.title, movies.tmdb_id from threads INNER JOIN movies on threads.movie_id = movies.id group by movies.title ORDER BY COUNT(*) DESC;';
        $result = \DB::select(\DB::raw($query));
        return view('home.index')->with([
            'results' => $result,

        ]);
    }
}