<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Bar;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase {

    public function testDependency() {
        // $foo = new Foo;
        // Service Container Laravel
        $foo1 = $this->app->make(Foo::class); // new Foo()
        $foo2 = $this->app->make(Foo::class); // new Foo()

        self::assertEquals("Foo", $foo1->foo());
        self::assertEquals("Foo", $foo2->foo());
        self::assertNotSame($foo1, $foo2);
    }

    public function testBind() {
        // $person = $this->app->make(Person::class);
        // self::assertNotNull($person);

        // bind() digunakan untuk membuat object yang ada constructornya dengan service container 
        $this->app->bind(Person::class, function ($app) {
            return new Person("Rifki", "Muhazzar");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Rifki", $person1->firstName);
        self::assertEquals("Rifki", $person2->firstName);
        self::assertNotSame($person1, $person2);
    }

    public function testSingleton() {
        // singleton() seperti bind(), hanya saja singleton() hanya membuat objectnya sekali saja
        $this->app->singleton(Person::class, function ($app) {
            return new Person("Rifki", "Muhazzar");
        });

        $person1 = $this->app->make(Person::class); // new Person("Rifki", "Muhazzar") if not exist
        $person2 = $this->app->make(Person::class); // return existing
        $person3 = $this->app->make(Person::class); // return existing
        $person4s = $this->app->make(Person::class); // return existing

        self::assertEquals("Rifki", $person1->firstName);
        self::assertEquals("Rifki", $person2->firstName);
        self::assertSame($person1, $person2);
    }

    public function testInstance() {
        // instance() seperti singletn(), hanya saja instance() langsung membuat objecnya
        $person = new Person("Rifki", "Muhazzar");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class); // return existing | $person
        $person2 = $this->app->make(Person::class); // return existing | $person
        $person3 = $this->app->make(Person::class); // return existing | $person
        $person4 = $this->app->make(Person::class); // return existing | $person

        self::assertEquals("Rifki", $person1->firstName);
        self::assertEquals("Rifki", $person2->firstName);
        self::assertSame($person1, $person2);
    }
    
    
    public function testDependencyInjection() {
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });
        $this->app->singleton(Bar::class, function ($app) {
            return new Bar($app->make(Foo::class));
        });

        $foo = $this->app->make(Foo::class);
        // Bar() memiliki parameter object Foo maka akan di buat secara otomatis oleh service container laravel | bisa juga di buat dengan singleton seperti di atas, jadi objectnya sama
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($foo, $bar1->foo);
        self::assertSame($bar1, $bar2);
    }

    public function testInterfaceToClass() {
        // $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);
        $this->app->singleton(HelloService::class, function ($app) {
            return new HelloServiceIndonesia();
        });

        $helloService = $this->app->make(HelloService::class);

        self::assertEquals("Halo Rifki", $helloService->hello("Rifki"));
    }
}
