<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use OwowAgency\Snapshots\MatchesSnapshots;

abstract class TestCase extends BaseTestCase
{
    use MatchesSnapshots;
}
