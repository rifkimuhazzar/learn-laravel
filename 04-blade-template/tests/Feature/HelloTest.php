<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloTest extends TestCase
{
    public function testHello() {
        $this->get("/hello")
        ->assertSeeText("Laravel");
    }

    public function testHelloWorld() {
        $this->get("/world")
        ->assertSeeText("Learn Laravel");
    }

    public function testHelloView() {
        $this->view("hello", ["name" => "Laravel"])
        ->assertSeeText("Laravel");
    }

    public function testHelloWorldView() {
        $this->view("hello.world", ["name" => "Learn Laravel"])
        ->assertSeeText("Learn Laravel");
    }
}
