<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('posts.index', function($view) {
            $posts = \App\Post::orderBy('created_at', 'desc')->get();
            $posts = $posts->reject(function($post) {
                return $post->title === '' && $post->body === '';
            });
            $view->with('posts', $posts);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
