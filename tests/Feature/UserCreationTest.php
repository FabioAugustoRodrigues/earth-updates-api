<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserCreationTest extends TestCase
{
    use RefreshDatabase;

    protected $authUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->authUser = User::factory()->create();
    }

    public function test_create_user_successfully()
    {
        $data = [
            'name' => 'User Test',
            'email' => 'user@test.com',
            'password' => 'password123',
        ];

        $response = $this->actingAs($this->authUser, 'api')->postJson('/api/users', $data);

        $response->assertStatus(201);
    }

    public function test_create_user_email_already_in_use()
    {
        User::factory()->create(['email' => 'user@test.com']);
        $data = [
            'name' => 'User Test',
            'email' => 'user@test.com',
            'password' => 'password123',
        ];

        $response = $this->actingAs($this->authUser, 'api')->postJson('/api/users', $data);

        $response->assertStatus(409);
    }
}
