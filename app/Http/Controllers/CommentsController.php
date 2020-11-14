<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Auth;
use Validator;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        // 保存
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return redirect('/');
    }

    public function delete(Request $request)
    {
        //削除
        $comment = Comment::find($request->comment_id);
        $comment->delete();

        return redirect('/');
    }
}
