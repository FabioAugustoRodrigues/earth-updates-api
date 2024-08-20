<?php

namespace Tests\Unit;

use App\Models\User;
use App\Exceptions\DomainException;
use App\Services\AuthService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    protected $authService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->authService = app(AuthService::class);
    }

    public function test_login_user_successfully()
    {
        $existingUser = User::factory()->create([
            'name' => 'User Test',
            'email' => 'user@test.com',
            'password' => Hash::make('password123'),
        ]);

        $credentials = ['email' => 'user@test.com', 'password' => 'password123'];

        $result = $this->authService->login($credentials);

        $this->assertArrayHasKey('token_type', $result);
        $this->assertEquals('bearer', $result['token_type']);
        $this->assertArrayHasKey('expires_in', $result);
        $this->assertEquals(3600, $result['expires_in']);
    }

    public function test_login_user_with_invalid_credentials()
    {
        $credentials = ['email' => 'invalid@test.com', 'password' => 'wrongpassword'];

        $this->expectException(DomainException::class);

        $this->authService->login($credentials);
    }
}
