<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    public function testResponse() {
        $this->get("/response/hello")
        ->assertStatus(200)
        ->assertSeeText("This is response");
    }

    public function testHeader(){
        $this->get("response/header")
        ->assertStatus(200)
        ->assertSeeText("firstName")
        ->assertSeeText("Rifki")
        ->assertSeeText("lastName")
        ->assertSeeText("Muhazzar")
        ->assertHeader("Content-Type", "application/json")
        ->assertHeader("author", "Rifki")
        ->assertHeader("App", "Learn Laravel");
    }

    public function testView() {
        $this->get("/response/type/view")
        ->assertSeeText("Hello this is view");
    }

    public function testJson() {
        $this->get("/response/type/json")
        ->assertJson([
            "firstName" => "Rifki",
            "lastName" => "Muhazzar"
        ]);
    }

    public function testRenderFile() {
        $this->get("/response/type/file")
        ->assertHeader("content-type", "image/jpeg");
    }

    public function testDownload() {
        $this->get("/response/type/download")
        ->assertDownload("ss.jpg");
    }
}
