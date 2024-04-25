<?php

namespace Tests;

use OwowAgency\Snapshots\MatchesSnapshots;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use MatchesSnapshots;
}
