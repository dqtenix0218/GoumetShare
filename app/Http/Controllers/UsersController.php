<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Http\Requests\UserModelRequest;
use Auth;

use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function show($user_id)
    {
        //レコードを取得
        $user = User::getUserById($user_id)
            ->firstOrFail();

        $posts = Post::getPostsByUserId($user_id)
            ->orderBy('created_at', 'desc')
            ->simplePaginate(5);

        $count_followings=User::find($user_id)->followings()->count();
        $count_followers=User::find($user_id)->followers()->count();

        return view('user/show', ['user' => $user, 'posts' => $posts,'count_followings'=>$count_followings, 'count_followers'=>$count_followers]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('user/edit', ['user' => $user]);
    }

    public function update(UserModelRequest $request)
    {

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
