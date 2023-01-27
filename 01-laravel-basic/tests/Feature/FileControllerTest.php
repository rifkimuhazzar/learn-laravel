<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FileControllerTest extends TestCase
{
    public function testUpload() {
        // aktifkan dahulu gd extensionnnya di php.ini agar bisa menggunakan fake()
        $picture = UploadedFile::fake()->image("contoh.jpg");

        $this->post("/file/upload", ["picture" => $picture])
        ->assertSeeText("OK : contoh.jpg");
    }
}
