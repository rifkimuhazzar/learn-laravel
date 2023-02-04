<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormTest extends TestCase
{
    public function testForm() {
        $this->view("form", ["user" => [
            "premium" => true,
            "name" => "Rifki",
            "admin" => true
        ]])->assertSee("checked")
        ->assertSee("Rifki")
        ->assertDontSee("readonly");

        $this->view("form", ["user" => [
            "premium" => false,
            "name" => "Rifki",
            "admin" => false
        ]])->assertDontSee("checked")
        ->assertSee("Rifki")
        ->assertSee("readonly");
    }
}
