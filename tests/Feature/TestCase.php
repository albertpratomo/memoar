<?php

namespace Tests\Feature;

use Illuminate\Testing\TestResponse;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Assert that $response renders Inertia $component with snapshotted props.
     */
    public function assertInertia(TestResponse $response, string $component, bool $exactProps = false): TestResponse
    {
        $response->assertStatus(200);

        $response->assertInertia(fn (AssertableInertia $page) => $page->component($component));

        $assertProps = $exactProps
            ? 'assertMatchesJsonSnapshot'
            : 'assertJsonStructureSnapshot';

        $this->$assertProps($response->inertiaPage()['props']);

        return $response;
    }
}
