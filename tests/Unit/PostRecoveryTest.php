<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Services\PostService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostRecoveryTest extends TestCase
{
    use RefreshDatabase;

    protected $postService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->postService = app(PostService::class);
    }

    public function test_returns_only_today_posts()
    {
        $postToday = Post::create([
            'title' => 'Post test 1',
            'content' => 'Content test 1'
        ]);

        $postYesterday = Post::create([
            'title' => 'Post test 2',
            'content' => 'Content test 2'
        ]);

        Post::where('id', $postYesterday->id)->update(['created_at' => Carbon::yesterday()]);

        $postsToday = $this->postService->getPostsToday();

        $this->assertCount(1, $postsToday);
    }

    public function test_returns_only_this_week_posts()
    {
        $postThisWeek = Post::create([
            'title' => 'Post test 1',
            'content' => 'Content test 1'
        ]);

        $postLastWeek = Post::create([
            'title' => 'Post test 2',
            'content' => 'Content test 2'
        ]);

        Post::where('id', $postLastWeek->id)->update(['created_at' => Carbon::now()->subWeek()]);

        $postsThisWeek = $this->postService->getPostsThisWeek();

        $this->assertCount(1, $postsThisWeek);
    }
}
