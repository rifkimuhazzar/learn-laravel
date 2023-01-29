<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\RedirectResponse;
use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
    public function testRedirect() {
        $this->get("/redirect/from")
        ->assertRedirect("/redirect/to");
    }

    public function testRedirectName() {
        $this->get("/redirect/user")
        ->assertRedirect("/redirect/user/Rifki");
    }

    public function testRedirectAction() {
        $this->get("/redirect/action")
        ->assertRedirect("/redirect/user/Rifki%202");
    }

    public function testRedirectAway() {
        $this->get("/redirect/away")
        ->assertRedirect("https://www.github.com");
    }

}
