<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Thread;
use App\Comment;

class CommentController extends Controller
{
    public function create($id, Request $req)
    {
        $user = Auth::user();
        $thread = Thread::findOrFail($id);
        $body = $req->get('body');
        $comment = new Comment([
            'body' => $body
        ]);
        $comment->user_id = $user->id;
        $thread->comments()->save($comment);
        return redirect()->route('thread_detail', ['id' => $thread->id]);
    }
}
