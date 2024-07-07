<?php

namespace Tests\Feature\Tributes;

use App\Models\Site;
use Tests\Feature\TestCase;
use Illuminate\Testing\TestResponse;

class StoreTest extends TestCase
{
    /** @test */
    public function guest_can_store_tribute(): void
    {
        [$site] =  $this->prepare();

        $data = $this->requestData($site);

        $response = $this->makeRequest($data);

        $this->assertResponse($response);

        $this->assertDatabase($data);
    }

    private function prepare(): array
    {
        $site = Site::factory()->create();

        return [$site];
    }

    private function requestData(Site $site): array
    {
        return [
            'author' => 'Albert',
            'body' => 'A tribute.',
            'siteId' => $site->id,
        ];
    }

    private function makeRequest(array $data): TestResponse
    {
        return $this->post('api/tributes', $data);
    }

    private function assertResponse(TestResponse $response): void
    {
        $response->assertStatus(201);

        $this->assertMatchesJsonSnapshot($response->json());
    }

    private function assertDatabase(array $data): void
    {
        $data = array_keys_convert_case($data, 'snake');

        $this->assertDatabaseHas('tributes', $data);

        $this->assertDatabaseCount('tributes', 1);
    }
}
