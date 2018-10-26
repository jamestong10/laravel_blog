<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\PostRepository;
use App\Post;

class PostComposer
{
    /**
     * The user repository implementation.
     *
     * @var PostRepository
     */
    protected $posts;

    /**
     * Create a new Post composer.
     *
     * @param  PostRepository  $posts
     * @return void
     */
    public function __construct(PostRepository $posts)
    {
        // Dependencies automatically resolved by service container...
        $this->posts = $posts;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('posts', $this->posts->all());
    }
}