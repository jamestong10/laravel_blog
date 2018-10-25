<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;

class PostsController extends Controller
{   
    
    protected $postRepository;

    public function __construct(PostRepository $postRepository )
    {
        $this->postRepository = $postRepository;
    }

    public function index() {
        $hotPosts = $this->postRepository->hotPost();
        $states = $this->postRepository->statisticState();
        $mappingState = ['0' => '草稿', '1' => '公開發佈', '2' => '私人發佈', '3' => '垃圾桶'];
        return view('posts.index', compact('hotPosts', 'states', 'mappingState'));
    }

    public function show($id) {
        $post = $this->postRepository->find($id);

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
        $post = $this->postRepository->find($id);

        if (!is_null($post)) { 
            return view('posts.edit', compact('post'));
        } else {
            return redirect()->route('posts_index')->with('error', '查無此文章');
        }
    }

    public function update(StorePost $request, $id) {

        try {
            $post = $this->postRepository->find($id);
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
