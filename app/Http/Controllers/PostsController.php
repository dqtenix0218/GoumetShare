<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Http\Requests\CreatePostRequest;
use Auth;
use Validator;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index()
    {
        //レコードを取得
        $user = Auth::user();
        $followings = $user->followings()->get();

        if ($followings->isEmpty()) {
            $posts = Post::orderBy('created_at', 'desc')
                ->paginate(5);
        } else {
            $followings_ids = $user->followings()->pluck('follow_id')->toArray();
            $posts = Post::WhereIn('user_id', $followings_ids)
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        }
        return view('post/index', ['posts' => $posts]);
    }

    public function search(Request $request)
    {
        if(empty($request->search)){
            $posts = Post::orderBy('created_at', 'desc')
            ->paginate(5);
        }else{
            $posts = Post::search($request->search)
            ->orderBy('created_at', 'desc')->paginate(5);
        }
            return view('post/index', ['posts' => $posts]);
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
