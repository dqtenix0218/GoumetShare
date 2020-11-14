<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\CreatePostRequest;
use Auth;
use Validator;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index()
    {
        //レコードを取得
        $posts = Post::orderBy('created_at', 'desc')
            ->simplePaginate(5);

        return view('post/index', ['posts' => $posts]);
    }

    public function search(Request $request)
    {
        //検索結果を取得
        $search_posts = Post::search($request->search)
            ->orderBy('created_at', 'desc')->simplePaginate(5);

        $validator = Validator::make($request->all(), ['search' => 'required']);
        if ($validator->fails()) {
            return redirect("/");
        } else {

            return view('post/index', ['posts' => $search_posts]);
        }
    }

    public function new()
    {
        return view('post/new');
    }

    public function store(CreatePostRequest $request)
    {
        //内容を保存
        $post_data = [
            'caption' => $request->caption,
            'user_id' => Auth::user()->id,
            'address' => $request->address,
            'place' => $request->place,
            'genre' => $request->genre,
            'image' => base64_encode(file_get_contents($request->photo)),
        ];

        $post = Post::create($post_data);

        //$request->photo->storeAs('public/post_images', $post->id . '.jpg');

        return redirect('/');
    }

    public function delete($post_id)
    {
        //削除
        $post = Post::find($post_id);
        $post->delete();

        return redirect('/');
    }

    public function getAddressById($post_id)
    {
        $post = Post::find($post_id);

        return view('/post/address', ['post' => $post]);
    }
}
