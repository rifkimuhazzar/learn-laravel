<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IncludeTest extends TestCase
{
    public function testInclude() {
        $this->view("include", [])
        ->assertSeeText("This is default title")
        ->assertSeeText("This is description")
        ->assertSeeText("Welcome to My Website");

        $this->view("include", ["title" => "Hello"])
        ->assertSeeText("Hello")
        ->assertSeeText("This is description")
        ->assertSeeText("Welcome to My Website");
    }
}
