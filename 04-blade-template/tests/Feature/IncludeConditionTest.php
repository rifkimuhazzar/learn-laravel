<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IncludeConditionTest extends TestCase
{
    public function testIncludeCondition() {
        $this->view("include-condition", [
            "user" => [
                "name" => "Rifki 1",
                "admin" => true
            ]
        ])->assertSeeText("Selamat datang Admin")
        ->assertSeeText("Selamat datang Rifki 1");

        $this->view("include-condition", [
            "user" => [
                "name" => "Rifki 2",
                "admin" => false
            ]
        ])->assertDontSeeText("Selamat datang Admin")
        ->assertSeeText("Selamat datang Rifki 2");
    }
}
