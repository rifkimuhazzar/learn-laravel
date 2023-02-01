<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage() {
        $this->get("/login")
        ->assertSeeText("Login");
    }

    public function testLoginPageForMembeer() {
        $this->withSession([
            "user" => "rifki"
        ])->get("/login")
        ->assertRedirect("/");
    }

    public function testLoginSuccess() {
        $this->post("/login", [
            "user" => "rifki",
            "password" => "12345"
        ])->assertRedirect("/")
        ->assertSessionHas("user", "rifki");
    }

    public function testLoginForUserAlreadyLogin() {
        $this->withSession([
            "user" => "rifki"
        ])->post("/login", [
            "user" => "rifki",
            "password" => "12345"
        ])->assertRedirect("/");
    }

    public function testLoginValidationError() {
        $this->post("/login", [])
        ->assertSeeText("User or password is required");
    }

    public function testLoginFailed() {
        $this->post("/login", [
            "user" => "hello",
            "password" => "12345"
        ])
        ->assertSeeText("User or password is wrong");
    }

    
    public function testLogout() {
        $this->withSession([
            "user" => "rifki"
        ])->post("/logout")
        ->assertRedirect("/")
        ->assertSessionMissing("user");
    }

    public function testLogoutGuest() {
        $this->post("/logout")
        ->assertRedirect("/");
    }
}
