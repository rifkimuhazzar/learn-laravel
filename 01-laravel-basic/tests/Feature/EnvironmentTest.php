<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
   public function testGetEnv() {
    $youtube = env("Belajar");

    self::assertEquals("Laravel Basic", $youtube);
   }

   public function testDefaultEnv() {
    $author = Env::get("AUTHOR", "Rifki");

    self::assertEquals("Rifki", $author);
   }
}
