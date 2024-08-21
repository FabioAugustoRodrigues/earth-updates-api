<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostCreationTest extends TestCase
{
    use RefreshDatabase;

    protected $postService;

    protected function setUp(): void
    {
        parent::setUp();
    
        $this->postService = app(PostService::class);
    }

    public function test_create_post_successfully()
    {
        $data = [
            'title' => 'Post title',
            'content' => 'Post content'
        ];

        $post = $this->postService->create($data);

        $this->assertInstanceOf(Post::class, $post);
        $this->assertEquals($data['title'], $post->title);
    }
}
