<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class UserFollowController extends Controller
{
    public function store($user_id)
    {
        Auth::user()->follow($user_id);

        return back();
    }

    public function destroy($user_id)
    {
        Auth::user()->unfollow($user_id);

        return back();
    }

    public function getFollowingsById($user_id)
    {

        $followings = User::find($user_id)->followings()->paginate(10);

        return view('user/followings_list', ['followings' => $followings]);
    }

    public function getFollowersById($user_id)
    {

        $followers = User::find($user_id)->followers()->paginate(10);

        return view('user/followers_list', ['followers' => $followers]);
    }
}
