<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
  public function testInput() {
    $this->get("/input/hello?name=Rifki")
    ->assertSeeText("Hello Rifki");

    $this->post("/input/hello", ["name" => "Rifki"])
    ->assertSeeText("Hello Rifki");
  }

  public function testInputNested() {
    $this->post("/input/hello/first", [
      "name" => [
        "first" => "Rifki 1", 
        "last" => "Rifki 2"
      ]
    ])->assertSeeText("Hello Rifki 1");
  }

  public function testInputAll() {
    $this->post("/input/hello/input", [
      "name" => [
        "first" => "Rifki 1", 
        "last" => "Rifki 2"
      ]
    ])->assertSeeText("name")
    ->assertSeeText("first")
    ->assertSeeText("last")
    ->assertSeeText("Rifki 1")
    ->assertSeeText("Rifki 2");
  }

  public function testInputArray() {
    $this->post("/input/hello/array", [
      "products" => [
        [
            "name" => "Apple Mac Book Pro 14",
            "price" => "30.000.000"
        ],
        [
            "name" => "iPhone 14 Pro Max",
            "price" => "15.000.000"
        ]
      ]
    ])->assertSeeText("Apple Mac Book Pro 14")
    ->assertSeeText("iPhone 14 Pro Max");
  }
}
