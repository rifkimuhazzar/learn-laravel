<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InheritanceTest extends TestCase
{
    public function testInheritance() {
        $this->view("child", [])
        ->assertSeeText("Nama Aplikasi - First Page")
        ->assertSeeText("Default header")
        ->assertSeeText("This is header")
        ->assertDontSeeText("Default content")
        ->assertSeeText("This is content");
    }

    public function testInheritanceWithoutOverride() {
        $this->view("child-default", [])
        ->assertSeeText("Nama Aplikasi - First Page")
        ->assertSeeText("Default header")
        ->assertSeeText("Default content")
        ->assertDontSeeText("This is header")
        ->assertDontSeeText("This is content");
    }
}
