<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;

class PostsControllerTest extends TestCase
{
    public function testCreateNewPost() {

        $post  = Factory('App\Post')->make();
        $response = $this->post(route('posts_store'), $post->toArray());
        
        $response->assertStatus(302);
        $response->assertRedirect(route('posts_index'));
        
        $insertedPost = Post::latest()->first();
        $this->assertEquals(
            [ $insertedPost->title,$insertedPost->body ], 
            [ $post->title, $post->body ]);
    }

    public function testPostValidation() {
        $post = new Post;
        $post->title = '';
        $post->body  = '';

        $response = $this->post(route('posts_store'), $post->toArray());
        $response->assertSessionHasErrors();
        $errors = session('errors');
        $this->assertEquals($errors->get('title')[0],"The title field is required.");
        $this->assertEquals($errors->get('body')[0],"The body field is required.");
    }
}
