<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RawTest extends TestCase
{
    public function testView() {
        $this->view("raw", [])
        ->assertSeeText("Rifki")
        ->assertSeeText("Singapore");
    }
}
