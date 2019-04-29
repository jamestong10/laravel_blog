<?php

namespace App\Repositories;
use App\Post;
use Cache;

class PostRepository {

  public function find($id) {
    return Post::find($id);
  }

  public function hotPost() {
    return Post::whereIn('state', array(1,2))
            ->where('hits', '>', 50)
            ->orderBy('hits', 'desc')
            ->get();
  }

  public function statisticState() {
    return Post::selectRaw('state, count(state) as cnt')
            ->groupBy('state')
            ->get();
  }

  public function allPosts() {
    $posts = Cache::rememberForever('all_posts', function() {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return $posts->reject(function($post) {
            return $post->title === '' && $post->body === '';
        });
    });

    return $posts;
  }

  public function allPostsIncludeEmptyTitleAndBody() {
    return Post::orderBy('created_at', 'desc')->get();
  }
}
