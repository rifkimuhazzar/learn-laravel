<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tests\TestCase;

class CookieControllerTest extends TestCase
{
    // encrypt dan decrypt cookie dilakukan secara otomatis pada req/res ataupun test

    function testCreateCookie() {
        $this->get("/cookie/set")
        ->assertSeeText("Hello Cookie")
        ->assertCookie("user-id", "rifki")
        ->assertCookie("is-member", "true");
    }

    public function testGetCookie() {
        $this->withCookie("user-id", "rifki")
        ->withCookie("is-member", "true")
        ->get("/cookie/get")
        ->assertJson([
            "UserId" => "rifki",
            "IsMember" => "true"
        ]);
    }
}
