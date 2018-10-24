<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $hotPosts = Post::published()->where('hits', '>', 50)->descendingHits()->get();
        $states = Post::selectRaw('state, count(state) as cnt')->groupBy('state')->get();
        $mappingState = ['0' => '草稿', '1' => '公開發佈', '2' => '私人發佈', '3' => '垃圾桶'];
        return view('posts.index', compact('posts', 'hotPosts', 'states', 'mappingState'));
    }

    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        try {
            $post = new Post;
            $post->title = request('title');
            $post->body = request('body');
            $post->author = str_random(10);
            $post->save();
        } catch(\Exception $e) {
            echo $e->getMessage();
            return back()->with('error', '文章建立失敗，請重新輸入');
        }

        return redirect()->route('posts_index');
    }
}
