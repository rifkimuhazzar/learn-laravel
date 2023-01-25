<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testView() {
        $this->get("/hello1")
        ->assertSeeText("Hello Rifki 1");

        $this->get("/hello2")
        ->assertSeeText("Hello Rifki 2");
    }

    public function testNested() {
        $this->get("/hello-world")
        ->assertSeeText("Hello World");
    }

    public function testTemplate() {
        $this->view("hello", ["name" => "World"])
        ->assertSeeText("Hello World");

        $this->view("hello.world", ["name" => "Hello"])
        ->assertSeeText("Hello World");
    }
}
