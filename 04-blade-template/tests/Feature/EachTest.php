<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EachTest extends TestCase
{
    public function testEach() {
        $this->view("each", [
            "users" => [
            [
                "name" => "Rifki 1",
                "hobbies" => ["Coding", "Gaming"]
            ],
            [
                "name" => "Rifki 2",
                "hobbies" => ["Coding", "Gaming"]
            ]
        ]])->assertSeeInOrder([
            ".red",
            "Rifki 1",
            "Coding",
            "Gaming",
            "Rifki 2",
            "Coding",
            "Gaming"
        ]);
    }
}
