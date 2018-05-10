<?php

namespace App\Http\Controllers\Thread;

use App\Http\Controllers\Controller;
use App\Movie;
use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function create($id)
    {
        $user = \Auth::user();
        if (!$user) {
            return redirect('/login');
        }
        $movie = Movie::find($id);

        if (!$movie) {
            return redirect('/');
        }

        return view('threads.create')->with([
            'thread' => new Thread(),
            'movie_id' => $movie->id,
            'movie_title' => $movie->title,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);
        $user = \Auth::user();
        if (!$user) {
            return redirect('/login');
        }
        $thread = new Thread();
        $thread->title = $request->title;
        $thread->text = $request->text;
        $thread->movie_id = $request->movie_id;
        $thread->user_id = $user->id;
        $thread->save();

        $movie = Movie::find($thread->movie_id);
        return redirect('/movie/' . $movie->tmdb_id);
    }

    public function show($id)
    {
        $thread = Thread::find($id);
        if (!$thread) {
            return redirect('/');
        }
        return view('threads.show')->with([
            'thread' => $thread,
            'movie' => $thread->movie,
        ]);
    }

    public function edit($id)
    {
        $thread = Thread::find($id);
        if (!$thread) {
            return redirect('/');
        }
        return view('threads.edit')->with([
            'thread' => $thread,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);
        $thread = Thread::find($id);
        $thread->title = $request->title;
        $thread->text = $request->text;
        $thread->save();
        return redirect('/threads/' . $id);
    }

    public function delete($id)
    {
        $thread = Thread::find($id);
        return view('threads.delete')->with([
            'thread' => $thread,
        ]);
    }

    public function destroy($id)
    {
        $thread = Thread::find($id);
        $movie = $thread->movie;
        $thread->delete();
        return redirect('/movie/' . $movie->tmdb_id);
    }
}
