<?php

namespace App\Http\ViewComposers;

use App\Repositories\PostRepository;
use Illuminate\View\View;

class PostComposer
{
    /**
     * The user repository implementation.
     *
     * @var PostRepository
     */
    protected $postRepo;

    /**
     * Create a new Post composer.
     *
     * @param  PostRepository  $postRepo
     * @return void
     */
    public function __construct(PostRepository $postRepo)
    {
        // Dependencies automatically resolved by service container...
        $this->postRepo = $postRepo;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('posts', $this->postRepo->allPosts());
    }
}
