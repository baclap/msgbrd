<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function showProfile($id) {
        $user = User::where('id', $id)
            ->with([
                'threads' => function($query) {
                    $query->limit(5)->orderBy('created_at', 'DESC');
                },
                'comments.thread' => function($query) {
                    $query->limit(5)->orderBy('created_at', 'DESC');
                }
            ])
            ->get()
            ->first();
        if (!$user) {
            abort(404);
        }
        return view('user/profile', [
            'user' => $user->toArray()
        ]);
    }
}
