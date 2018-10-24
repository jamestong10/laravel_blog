<?php

use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', 'PostsController@index')->name('posts_index');
Route::get('/posts/{post}', 'PostsController@show')->name('posts_show');