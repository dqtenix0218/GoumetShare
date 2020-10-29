<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Validator;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        //ログインしていないときログイン画面へ遷移
        $this->middleware('auth');
    }

    public function index()
    {
        //レコードを取得
        $posts = Post::orderBy('created_at', 'desc')
            ->simplePaginate(5);

        return view('post/index', ['posts' => $posts]);
    }

    public function search(Request $request)
    {
        $search_posts = Post::where('genre', 'like', '%' . $request->search . '%')
            ->orwhere('caption', 'like', '%' . $request->search . '%')
            ->orWhere('place', 'like', '%' . $request->search . '%')
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

    public function store(Request $request)
    {
        //バリデーションルール・メッセージ
        $rules = ['caption' => 'required|max:255', 'photo' => 'required|max:1024', 'address' => 'required', 'place' => 'required', 'genre' => 'required'];
        $messages = [
            'required' => '※必須項目です。',
            'max' => '※入力は255文字までです。',
            'photo.required' => '※画像は必ず選択して下さい。',
            'photo.max' => '※画像のサイズは1MBまでです。'
        ];
        //バリデーション
        $validator = Validator::make($request->all(), $rules, $messages);
        //バリデーション結果がエラーだったら
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //内容を保存
        $post = new Post;
        $post->caption = $request->caption;
        $post->user_id = Auth::user()->id;
        $post->address = $request->address;
        $post->place = $request->place;
        $post->genre = $request->genre;
        //herokuでは、画像保存が一時的なものとなってしまうため、あまり好ましくないが画像データをデータベースに保存する。
        $post->image = base64_encode(file_get_contents($request->photo));

        $post->save();

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

    public function address($post_id)
    {
        $post = Post::find($post_id);

        return view('/post/address', ['post' => $post]);
    }
}
