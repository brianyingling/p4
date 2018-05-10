<?php

// SORTING
// select count(*), movies.title 
// from threads 
// INNER JOIN movies 
// on threads.movie_id = movies.id 
// group by movies.title 
// ORDER BY COUNT(*) DESC;


namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use \Moment;
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
            // $release_date = (new \Moment\Moment($movie->release_date))->format('F dS Y');
            // dump($threads);
            return view('movies.show')->with([
                'movie' => $movie,
                'threads' => $threads,
                // 'release_date' => $release_date
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
                // dump($movie->release_date);
                return view('movies.show')->with([
                    'movie' => $savedMovie,
                    // 'release_date' => $movie->release_date
                ]);
            }
        } catch(Exception $e) {
            dump($e);
            return redirect('/');
        }
    }
}
