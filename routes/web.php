<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', 'PostsController@index')->name('posts_index');
Route::get('/post/create', 'PostsController@create')->name('posts_create');
Route::get('/post/{post}', 'PostsController@show')->name('posts_show')->where('post', '[0-9]+');
Route::post('/posts', 'PostsController@store')->name('posts_store');
Route::get('/post/{post}/edit', 'PostsController@edit')->name('posts_edit');
Route::put('/post/{post}', 'PostsController@update')->name('posts_update');
Route::post('/post/{id}/comment', 'CommentsController@store')->name('comment_store');
