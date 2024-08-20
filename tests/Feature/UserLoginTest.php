<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    protected $authUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->authUser = null;
    }

    public function test_login_user_successfully()
    {
        $existingUser = User::factory()->create([
            'name' => 'User Test',
            'email' => 'user@test.com',
            'password' => Hash::make('password123'),
        ]);

        $credentials = ['email' => 'user@test.com', 'password' => 'password123'];

        $response = $this->postJson('/api/users/login', $credentials);

        $response->assertStatus(200);
    }

    public function test_login_user_with_invalid_credentials()
    {
        $credentials = ['email' => 'invalid@test.com', 'password' => 'wrongpassword'];
        $response = $this->postJson('/api/users', $credentials);

        $response->assertStatus(401);
    }
}
