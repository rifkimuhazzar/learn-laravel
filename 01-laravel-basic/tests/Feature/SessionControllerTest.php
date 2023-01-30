<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    public function testCreateSession() {
        $this->get("/session/create")
                ->assertSeeText("OK")
                ->assertSessionHas("userId", "Rifki")
                ->assertSessionHas("isMember", true);
    }

    public function testGetSession() {
        $this->withSession([
            "userId" => "Rifki",
            "isMember" => "true"
        ])->get("/session/get")
            ->assertSeeText("User Id : Rifki, Is Member : true");
    }

    public function getSessionFailed() {
        $this->withSession([])->get("/session/get")
             ->assertSeeText("User Id : Guest, Is Member : false");
    }
}
