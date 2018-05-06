<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tmdb\Client;
use Tmdb\Repository\MovieRepository;
use App\Movie;
use App\Thread;

class MovieController extends Controller
{
    //
    public function show($id, Client $tmdb) {
        $movie = Movie::where('tmdb_id', $id)->first();
        if ($movie) {
            $threads = Thread::where('movie_id', $movie->id)->get();
            $thread = Thread::all()->first();
            // dump($threads);
            return view('movies.show')->with([
                'movie' => $movie,
                'threads' => $threads
            ]);
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
