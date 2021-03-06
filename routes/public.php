<?php

/*
|--------------------------------------------------------------------------
| Web Public Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use \App\Post;

Route::get('/', [

    'uses' => 'PostController@index',
    'as'   => 'posts.index',
]);

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('posts/{post}-{slug}', [
   'as' => 'posts.show',
   'uses' => 'PostController@show',
])->where('post', '\d+');
//->where('post', '[0-9]+');

// Comments
Route::post('post/{post}/comment', [
    'uses' => 'CommentController@store',
    'as'   => 'comments.store',
]);

Route::post('comments/{comment}/accept', [
   'uses' => 'CommentController@accept',
   'as'   => 'comments.accept',
]);


// Subscribe

Route::post('posts/{post}/subscribe', [
    'uses' => 'SubscriptionController@subscribe',
    'as' => 'posts.subscribe',
]);