<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    public function testLogging() {
        Log::info("This is info");
        Log::warning("This is warning");
        Log::error("This is error");
        Log::critical("This is critical");

        self::assertTrue(true);
    }

    public function testContext() {
        Log::info("This is info", ["user" => "rifki"]);
        Log::info("This is info", ["user" => "rifki"]);
        Log::info("This is info", ["user" => "rifki"]);

        self::assertTrue(true);
    }

    public function testWithContext() {
        Log::withContext(["user" => "rifki"]);

        Log::info("This is info");
        Log::info("This is info");
        Log::info("This is info");

        self::assertTrue(true);
    }

    public function testChannel() {
        $slackLogger = Log::channel("slack"); // return from channel is Logger object
        $slackLogger->error("This is slack"); // send to slack channel

        Log::info("Hello Laravel"); // send to default channel

        self::assertTrue(true);
    }

    public function testFilehandler() {
        $fileLogger = log::channel("file");
        $fileLogger->info("This is info");
        $fileLogger->warning("This is warning");
        $fileLogger->error("This is error");
        $fileLogger->critical("This is critical");

        self::assertTrue(true);
    }
}
