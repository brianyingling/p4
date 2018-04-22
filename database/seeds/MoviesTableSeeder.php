<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = [
            ['Batman', 'Overview 1', '/batman.jpg', '1', '1'],
            ['Batman Begins', 'Overview 1', '/batman.jpg', '1', '1'],
        ];

        foreach($movies as $key => $movieData) {
            $movie = new Movie();
            $movie->title = $movieData[0];
            $movie->overview = $movieData[1];
            $movie->poster_path = $movieData[2];
            $movie->imdb_id = $movieData[3];
            $movie->tmdb_id = $movieData[4];
            $book->save();
        }
    }
}
