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

Route::get('/', 'PostsController@index');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'PostsController@index');

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
Route::get('posts/{post_address}', 'PostsController@address');
