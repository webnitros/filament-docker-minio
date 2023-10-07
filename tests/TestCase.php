<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Snapshots\MatchesSnapshots;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;
    use MatchesSnapshots, SnapShotKeys;


    public function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\ShieldSeeder::class);
        $this->seed(\Database\Seeders\SeedSite::class);
    }

}
