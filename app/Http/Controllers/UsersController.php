<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Like;
use Auth;
use Validator;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        //ログインしていないときログイン画面へ遷移
        $this->middleware('auth');
    }

    public function show($user_id)
    {
        //レコードを取得
        $user = User::where('id', $user_id)
            ->firstOrFail();

        $posts = Post::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);

        return view('user/show', ['user' => $user, 'posts' => $posts]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('user/edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        //バリデーションルール、メッセージ
        $rules = [
            'user_name' => 'required|string|max:255',
            'user_password' => 'required|string|min:6|confirmed',
            'user_profile_photo' => 'max:1024'
        ];
        $messages = [
            'user_profile_photo.max' => '※画像は1MBまでです',
            'required' => '※必須項目です',
            'max' => '※225文字以内で入力して下さい',
            'min' => '※パスワードは6文字以上で入力して下さい',
            'confirmed' => '※パスワードが一致しません'
        ];
        //バリデーション
        $validator = Validator::make($request->all(), $rules, $messages);

        //バリデーションの結果がエラーの場合
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user = User::find($request->id);
        $user->name = $request->user_name;

        //if ($request->user_profile_photo != null) {
        //    $request->user_profile_photo->storeAs('public/user_images', $user->id . '.jpg');
        //    $user->profile_photo = $user->id . '.jpg';
        //}

        //herokuでは、画像保存が一時的なものとなってしまうため、あまり好ましくないが画像データをデータベースに保存する。
        $user->password = bcrypt($request->user_password);

        if ($request->user_profile_photo != null) {
            $user->image = base64_encode(file_get_contents($request->user_profile_photo));
        }

        $user->save();

        return redirect('/users/' . $request->id);
    }
}
