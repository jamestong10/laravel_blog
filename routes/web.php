<?php

use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show');

