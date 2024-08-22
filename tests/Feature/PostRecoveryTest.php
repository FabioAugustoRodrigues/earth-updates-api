<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostRecoveryTest extends TestCase
{
    use RefreshDatabase;

    protected $authUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->authUser = User::factory()->create();
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

        $response = $this->actingAs($this->authUser, 'api')->getJson('/api/posts/today');

        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data');
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

        $response = $this->actingAs($this->authUser, 'api')->getJson('/api/posts/week');

        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data');
    }
}
