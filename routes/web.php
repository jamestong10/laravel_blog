<?php

use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    $posts = Post::orderBy('created_at', 'desc')->get();
    $hotPosts = Post::published()->where('hits', '>', 50)->descendingHits()->get();
    $states = App\Post::selectRaw('state, count(state) as cnt')->groupBy('state')->get();
    $mappingState = ['0' => '草稿', '1' => '公開發佈', '2' => '私人發佈', '3' => '垃圾桶'];
    return view('posts', compact('posts', 'hotPosts', 'states', 'mappingState'));
});

