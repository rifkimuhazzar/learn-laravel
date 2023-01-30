<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class URLGenerationTest extends TestCase
{
    public function testURLCurrent() {
        $this->get("/url/current?name=Rifki")
        ->assertSeeText("/url/current?name=Rifki");
    }

    public function testNamed() {
        $this->get("/redirect/named")
        ->assertSeeText("/redirect/user/Rifki");
    }

    public function testAction() {
        $this->get("/url/action")
        ->assertSeeText("/form");
    }
}
