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
        $page = $request->input('page') ?: 1;
        $response = $tmdb->getSearchApi()->searchMovies($term, ['page' => $page]);
        $movies = $response['results'];
        $totalPages = $response['total_pages'];
        $nextPage = $page < $totalPages ? $page + 1 : null; 
        $prevPage = $page > 1 ? $page - 1 : null;
        $resultsCount = count($movies);
        $totalResults =  $response['total_results'];
        $pageResultsStartCount = $page == 1 ? 1 : ($page * 20 - 20 + 1);
        $pageResultsEndCount = ($page * 20 < $totalResults) ? ($resultsCount * $page) : $totalResults;
        return view('search.index')->with([
            'page_results_start_count' => $pageResultsStartCount,
            'prev_page' => $prevPage,
            'movies'=>$movies,
            'next_page'=> $nextPage,
            'page_results_end_count' => $pageResultsEndCount,
            'term' => urlencode($term),
            'total_results' => $totalResults,
        ]);
    }
}
