<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ForTest extends TestCase
{
    public function testFor() {
        $this->view("for", ["limit" => 10])
        ->assertSeeText("0")
        ->assertSeeText("1")
        ->assertSeeText("2")
        ->assertSeeText("3")
        ->assertSeeText("4")
        ->assertSeeText("5")
        ->assertSeeText("6")
        ->assertSeeText("7")
        ->assertSeeText("8")
        ->assertSeeText("9");
    }

    public function testForEach() {
        $this->view("foreach", ["hobbies" => ["Coding", "Watching Series"]])
        ->assertSeeText("Coding")
        ->assertSeeText("Watching Series");
    }

    public function testForElse() {
        $this->view("forelse", ["hobbies" => ["Coding", "Watching Series"]])
        ->assertSeeText("Coding")
        ->assertSeeText("Watching Series")
        ->assertDontSeeText("Don't have any hobbies", false);

        $this->view("forelse", ["hobbies" => []])
        ->assertDontSeeText("Coding")
        ->assertDontSeeText("Watching Series")
        ->assertSeeText("Don't have any hobbies", false);
    }
}
