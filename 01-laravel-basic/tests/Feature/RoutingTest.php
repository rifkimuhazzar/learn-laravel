<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testGet() {
        self::get("/hw")->assertStatus(200)->assertSeeText("Hello World");
    }

    public function testRedirect() {
        self::get("/youtube")
            ->assertRedirect("/hw");
    }

    public function testFallback() {
        self::get("/tidakada")
            ->assertSeeText("404 - Halaman tidak ditemukan");

        self::get("/tidakada2")
            ->assertSeeText("404 - Halaman tidak ditemukan");

        self::get("/tidakada3")
            ->assertSeeText("404 - Halaman tidak ditemukan");
    }

    public function testRouteParameter() {
        $this->get("/products/1")
        ->assertSeeText("Product 1");

        $this->get("/products/2")
        ->assertSeeText("Product 2");

        $this->get("/products/1/items/2")
        ->assertSeeText("Product 1, Item 2");

        $this->get("/products/3/items/4")
        ->assertSeeText("Product 3, Item 4");
    }

    public function testRouteParameterRegex() {
        $this->get("/categories/100")
        ->assertSeeText("Category 100");

        $this->get("/categories/hello")
        ->assertSeeText("404");
    }

    public function testRouteParameterOptional() {
        $this->get("/users/rifki")
        ->assertSeeText("User rifki");

        $this->get("/users/")
        ->assertSeeText("User 404"); 
    }

    public function testRouteConflict() {
        $this->get("/conflict/hello")
        ->assertSeeText("Conflict hello");

        $this->get("/conflict/frontend")
        ->assertSeeText("Conflict frontend developer");
    }

    public function testNamedRoute() {
        $this->get("/produk/12345")
        ->assertSeeText("Link http://localhost/products/12345");

        $this->get("/produk-redirect/12345")
        ->assertRedirect("/products/12345");
    }
}
