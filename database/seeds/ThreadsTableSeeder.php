<?php

use Illuminate\Database\Seeder;
use App\Thread;
use App\User;
use App\Movie;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::all()->first();
        $movie = Movie::all()->first();
        $thread = new Thread();
        $thread->title = 'I love this movie';
        $thread->text = 'This is the best movie in the world';
        $thread->movie_id = $user->id;
        $thread->user_id = $movie->id;
        $thread->save();
    }
}
