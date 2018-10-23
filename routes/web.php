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
    $posts = [];

    for($i = 1; $i <= 10; $i++) {
        array_push($posts, array('id' => $i, 
            'title' => str_random(10), 
            'body' => str_random(10),
            'author' => str_random(10)
        ));
    }
    return view('posts', compact('posts'));
});


