<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class FacadeTest extends TestCase
{
    public function testConfig() {
        $firstName1 = config("config.author.first");
        $firstName2 = Config::get("config.author.first");

        self::assertEquals($firstName1, $firstName2); 

        var_dump(Config::all());
    }

    public function testConfigDependency() {
        $config = $this->app->make("config");
        $firstName3 = $config->get("config.author.first");

        $firstName1 = config("config.author.first");
        $firstName2 = Config::get("config.author.first");

        self::assertEquals($firstName1, $firstName2); 
        self::assertEquals($firstName1, $firstName3); 

        var_dump($config->all());
    }

    public function testFacadeMock() {
        Config::shouldReceive("get")->with("contoh.author.first")->andReturn("Hello World");

        $firstName = Config::get("contoh.author.first");

        self::assertEquals("Hello World", $firstName);
    }
}
