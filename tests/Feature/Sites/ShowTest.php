<?php

namespace Tests\Feature\Sites;

use App\Models\Site;
use Tests\Feature\TestCase;

class ShowTest extends TestCase
{
    /** @test */
    public function guest_can_view_site()
    {
        $site = Site::factory()->withTributes(2)->create();

        $response = $this->get("/$site->username");

        $this->assertInertia($response, 'Sites/Show');
    }
}
