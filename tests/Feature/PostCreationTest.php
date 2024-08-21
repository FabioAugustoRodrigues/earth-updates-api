<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostCreationTest extends TestCase
{
    use RefreshDatabase;

    protected $authUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->authUser = User::factory()->create();
    }

    public function test_create_post_successfully()
    {
        $data = [
            'title' => 'Post title',
            'content' => 'Post content'
        ];

        $response = $this->actingAs($this->authUser, 'api')->postJson('/api/posts', $data);

        $response->assertStatus(201);
    }
}
