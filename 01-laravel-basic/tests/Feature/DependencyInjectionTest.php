<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Bar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DependencyInjectionTest extends TestCase
{   
    public function testDependencyInjection() {
        $bar = new Bar(new Foo);

        // $bar->setFoo(new Foo);
        // $bar->foo = new Foo;

        self::assertEquals("Foo and Bar", $bar->bar());
    }
}
