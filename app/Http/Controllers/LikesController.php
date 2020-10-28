<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Auth;
use Validator;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function __construct()
    {
        // ログインしていないときログインページへ遷移
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        // 保存
        $like = new Like;
        $like->post_id = $request->post_id;
        $like->user_id = Auth::user()->id;
        $like->save();

        return redirect('/');
    }

    public function delete(Request $request)
    {
        // 削除
        $like = Like::find($request->like_id);
        $like->delete();

        return redirect('/');
    }
}
