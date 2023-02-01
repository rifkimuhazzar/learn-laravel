<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
    public function testTodolist() {
        $this->withSession([
            "user" => "rifki",
            "todolist" => [
                [
                    "id" => "1",
                    "todo" => "Hello"
                ],
                [
                    "id" => "2",
                    "todo" => "World"
                ]
            ]
        ])->get("/todolist")
        ->assertSeeText("1")
        ->assertSeeText("Hello")
        ->assertSeeText("2")
        ->assertSeeText("World");
    }

    public function testAddTodoFailed() {
        $this->withSession([
            "user" => "rifki"
        ])->post("/todolist", [])
        ->assertSeeText("Todo is required");
    }

    public function testAddTodoSuccess() {
        $this->withSession([
            "user" => "rifki"
        ])->post("/todolist", [
            "todo" => "Hello"
        ])->assertRedirect("/todolist");
    }

    public function testRemoveTodolist() {
        $this->withSession([
            "user" => "rifki",
            "todolist" => [
                [
                    "id" => "1",
                    "todo" => "Hello"
                ],
                [
                    "id" => "2",
                    "todo" => "World"
                ]
            ]
        ])->post("/todolist/1/delete")
        ->assertRedirect("/todolist");
    }   
}
