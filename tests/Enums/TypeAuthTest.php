<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 20.09.2023
 * Time: 09:53
 */

namespace Tests\Enums;

use App\Enums\TypeAuth;
use Tests\TestCase;

class TypeAuthTest extends TestCase
{

    public function testTypeAuth()
    {
        $this->assertEquals('bearer', TypeAuth::bearer());
        $this->assertEquals('token', TypeAuth::token());
        $this->assertMatchesObjectSnapshot(TypeAuth::options());
    }

}
