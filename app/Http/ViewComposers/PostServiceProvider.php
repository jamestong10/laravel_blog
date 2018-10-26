<?php

namespace App\Http\ViewComposers;
use App\Post;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
      View::composer('posts.index', function($view) {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $posts = $posts->reject(function($post) {
          return $post->title === '' && $post->body === '';
        });
        $view->with('posts', $posts);
      });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}