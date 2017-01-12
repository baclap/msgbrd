<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use View;

class UserController extends Controller
{
    public function showProfile($id) {
        $profile = User::where('id', $id)
            ->with([
                'threads' => function($query) {
                    $query->limit(2);
                    $query->orderBy('id', 'desc');
                },
                'comments' => function($query) {
                    $query->limit(2);
                    $query->orderBy('id', 'desc');
                },
            ])
            ->get()
            ->first();
        if (!$profile) {
            abort(404);
        }
        return View::make('user/profile', [
            'profile' => $profile,
        ]);
    }
}
