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
            [
                "title" => $insertedPost->title,
                "body" => $insertedPost->body 
            ], 
            [
                "title" => $post->title,
                "body" => $post->body 
            ]);
    }
}
