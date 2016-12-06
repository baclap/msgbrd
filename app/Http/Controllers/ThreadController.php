<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Thread;
use View;

class ThreadController extends Controller
{
    public function showForm()
    {
        return View::make('thread/form');
    }

    public function create(Request $req)
    {
        $user = Auth::user();
        $title = $req->get('title');
        $body = $req->get('body');
        $thread = new Thread([
            'body' => $body,
            'title' => $title
        ]);
        $user->threads()->save($thread);
        return redirect()->route('thread_detail', ['id' => $thread->id]);
    }

    public function showThread($id)
    {
        $thread = Thread::where('id', $id)
            ->with('author', 'comments')
            ->get()
            ->first();
        if (!$thread) {
            abort(404);
        }
        // Twig Template version
        return View::make('thread/detail', [
          'thread' => $thread
        ]);
        // Default Blade Template version
        // return view('thread/detail', [
        //     'thread' => $thread->toArray()
        // ]);
    }
}
