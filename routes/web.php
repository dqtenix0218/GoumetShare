<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    //投稿一覧画面
    Route::get('/', 'PostsController@index');
    //検索結果一覧画面
    Route::post('/', 'PostsController@search');

    //プロフィール編集画面
    Route::get('/users/edit', 'UsersController@edit');
    //プロフィール更新画面
    Route::post('/users/update', 'UsersController@update');
    //プロフィール画面
    Route::get('/users/{user_id}', 'UsersController@show');
    //新規投稿画面
    Route::get('/posts/new', 'PostsController@new')->name('new');
    //投稿処理
    Route::post('/posts', 'PostsController@store');
    //投稿削除処理
    Route::get('/posts_delete/{post_id}', 'PostsController@delete');
    //いいね処理
    Route::get('/posts/{post_id}/likes', 'LikesController@store');
    //いいね取消処理
    Route::get('/likes/{like_id}', 'LikesController@delete');
    //コメント投稿処理
    Route::post('/posts/{comment_id}/comments', 'CommentsController@store');
    //コメント取消処理
    Route::get('/comments/{comment_id}', 'CommentsController@delete');
    //場所確認画面
    Route::get('posts/{post_address}', 'PostsController@getAddressById');
    //フォロー
    Route::get('/users/{user_id}/follow','UserFollowController@store');
    //フォロー解除
    Route::get('/users/{user_id}/unfollow', 'UserFollowController@destroy');
    //フォロー一覧
    Route::get('/users/{user_id}/followings_list', 'UserFollowController@getFollowingsById');
    //フォロワー一覧
    Route::get('/users/{user_id}/followers_list','UserFollowController@getFollowersById');

});
