<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tmdb\Client;
use Tmdb\Repository\MovieRepository;
use App\Movie;

class MovieController extends Controller
{
    //
    public function show($id, Client $tmdb) {
        $movie = Movie::where('tmdb_id', $id)->first();
        if ($movie) {
            return view('movies.show')->with(['movie' => $movie]);
        }
        try {
            $repository = new MovieRepository($tmdb);
            $movieData = $repository->load($id);
            if ($movieData) {
                $movie = new Movie();
                $movie->tmdb_id = $movieData->getId();
                $movie->title = $movieData->getTitle();
                $movie->poster_path = $movieData->getPosterPath();
                $movie->imdb_id = $movieData->getImdbId();
                $movie->tagline = $movieData->getTagline();
                $movie->status = $movieData->getStatus();
                $movie->overview = $movieData->getOverview();
                $movie->release_date = $movieData->getReleaseDate();
                $movie->save();
                $savedMovie = Movie::where('tmdb_id', $id)->first();
                return view('movies.show')->with(['movie' => $savedMovie]);
            }
        } catch(Exception $e) {
            dump($e);
            return redirect('/');
        }
    }
}
