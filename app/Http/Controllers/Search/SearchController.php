<?php

namespace App\Http\Controllers\Search;

use Config;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tmdb\Client;

class SearchController extends Controller
{
    public function index(Request $request, Client $tmdb) {
        $term = $request->input('term');
        $response = $tmdb->getSearchApi()->searchMovies($term);
        $movies = $response['results'];
        return view('search.index')
            ->with(['movies'=>$movies]);
    }
}
