<?php

use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/posts', 'PostsController@store')->name('posts_store');
Route::get('/posts/create', 'PostsController@create')->name('posts_create');
Route::get('/posts', 'PostsController@index')->name('posts_index');
Route::get('/posts/{post}', 'PostsController@show')->name('posts_show');