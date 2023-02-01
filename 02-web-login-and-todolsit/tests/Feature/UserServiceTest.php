<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
    }

    public function testLoginSuccess() {
        self::assertTrue($this->userService->login("rifki", "12345"));
    }

    public function testUserNotFound() {
        self::assertFalse($this->userService->login("rifki2", "12345"));
    }

    public function testWrongPassword() {
        self::assertFalse($this->userService->login("rifki", "123456"));
    }
    
}
