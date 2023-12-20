<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{


    public function follow(User $user)
    {

        $follower = auth()->user();

        $follower->followings()->attach($user);

        return back()->with('success', 'User followed with success !');
    }



    public function unfollow(User $user)
    {

        $follower = auth()->user();

        $follower->followings()->detach($user);

        return back()->with('success', 'User unfollowed with success !');
    }
}
