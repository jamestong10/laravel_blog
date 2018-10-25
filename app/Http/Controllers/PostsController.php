<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;

class PostsController extends Controller
{   
    public function index() {
        $hotPosts = Post::published()->where('hits', '>', 50)->descendingHits()->get();
        $states = Post::selectRaw('state, count(state) as cnt')->groupBy('state')->get();
        $mappingState = ['0' => '草稿', '1' => '公開發佈', '2' => '私人發佈', '3' => '垃圾桶'];
        return view('posts.index', compact('hotPosts', 'states', 'mappingState'));
    }

    public function show($id) {
        $post = Post::find($id);
        if (!is_null($post)) {
            return view('posts.show', compact('post'));
        } else {
            return redirect()->route('posts_index')->with('error', '查無此文章');
        }
    }

    public function create() {
        return view('posts.create');
    }

    public function store(StorePost $request) { 
        $request->validate([
            'title' => 'regex:/(^[a-zA-Z0-9_ ]+$)/'
        ]);

        try {
            $post = new Post;
            $post->title = request('title');
            $post->body = request('body');
            $post->author = str_random(10);
            $post->save();
        } catch(\Exception $e) {
            echo $e->getMessage();
            return back()->withErrors('文章建立失敗請重新輸入');
        }

        return redirect()->route('posts_index');
    }

    public function edit($id) {
        $post = Post::find($id);

        if (!is_null($post)) { 
            return view('posts.edit', compact('post'));
        } else {
            return redirect()->route('posts_index')->with('error', '查無此文章');
        }
    }

    public function update(StorePost $request, $id) {

        try {
            $post = Post::find($id);
            $post->title = $request['title'];
            $post->body = $request['body'];
            $post->save();
        } catch(\Exception $e) {
            echo $e->getMessage();
            return back()->withErrors('文章更新失敗請重新輸入');
        }

        return redirect()->route('posts_index');
    }
}
