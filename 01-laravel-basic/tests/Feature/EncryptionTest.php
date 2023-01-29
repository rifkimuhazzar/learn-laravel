<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class EncryptionTest extends TestCase
{
    function testEncryption() {
        $encrypt = Crypt::encrypt("Software Engineer");
        var_dump($encrypt);

        $decrypt = Crypt::decrypt($encrypt);

        self::assertEquals("Software Engineer", $decrypt);
    }
}
