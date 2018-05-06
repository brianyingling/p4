<?php

namespace App\Http\Controllers\Thread;

use Config;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Thread;
use App\Movie;

class ThreadController extends Controller
{
    public function show($id) {
        $thread = Thread::find($id);
        if (!$thread) {
            return redirect('/');
        }
        // dump($thread);
        return view('threads.show')->with([
            'thread' => $thread,
            'movie' => $thread->movie
        ]);
    }
}
