<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 20.09.2023
 * Time: 10:10
 */

namespace Tests\Enums;

use App\Enums\TypeAuth;
use App\Enums\TypeService;
use Tests\TestCase;

class TypeServiceTest extends TestCase
{

    public function testTeamcity()
    {
        $this->assertMatchesObjectSnapshot(TypeService::options());
    }
}
