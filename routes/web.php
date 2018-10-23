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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    $posts = DB::table('posts')->get();
    $hotPosts = DB::table('posts')
        ->where('hits', '>', 50)
        ->orderBy('hits', 'desc')
        ->get();
    return view('posts', compact('posts', 'hotPosts'));
});


