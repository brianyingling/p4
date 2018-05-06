<?php

use Illuminate\Database\Seeder;
use App\Movie;

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
            [
                'Star Wars', 
                'Princess Leia is captured and held hostage by the evil Imperial forces in their effort to take over the galactic Empire. Venturesome Luke Skywalker and dashing captain Han Solo team together with the loveable robot duo R2-D2 and C-3PO to rescue the beautiful princess and restore peace and justice in the Empire.',
                '/btTdmkgIvOi0FFip1sPuZI2oQG6.jpg',
                'tt0076759',
                '11',
                'released',
                '1977-05-25'
            ],
            ['Batman', 'Overview 1', '/batman.jpg', '1', '1', 'released',
            '1977-05-25'],
            ['Batman Begins', 'Overview 1', '/batman.jpg', '1', '1', 'released',
            '1977-05-25'],
        ];

        foreach($movies as $key => $movieData) {
            $movie = new Movie();
            $movie->title = $movieData[0];
            $movie->overview = $movieData[1];
            $movie->poster_path = $movieData[2];
            $movie->imdb_id = $movieData[3];
            $movie->tmdb_id = $movieData[4];
            $movie->status = $movieData[5];
            $movie->release_date = $movieData[6];
            $movie->save();
        }
    }
}
