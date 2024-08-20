<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\UserService;
use App\Exceptions\DomainException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserCreationTest extends TestCase
{
    use RefreshDatabase;

    protected $userService;

    protected function setUp(): void
    {
        parent::setUp();
    
        $this->userService = app(UserService::class);
    }

    public function test_create_user_successfully()
    {
        $data = [
            'name' => 'User Test',
            'email' => 'user@test.com',
            'password' => 'password123',
        ];

        $user = $this->userService->create($data);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($data['name'], $user->name);
    }

    public function test_create_user_email_already_in_use()
    {
        $existingUser = User::factory()->create(['email' => 'user@test.com']);
        $data = [
            'name' => 'Jane Doe',
            'email' => 'user@test.com',
            'password' => 'password123',
        ];

        $this->expectException(DomainException::class);

        $this->userService->create($data);
    }
}
