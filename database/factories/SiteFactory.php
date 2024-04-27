<?php

namespace Database\Factories;

use App\Models\Site;
use App\Models\Tribute;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site>
 */
class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'username' => fake()->userName(),
            'died_at' => now(),
        ];
    }

    public function withTributes(int $count = 2): Factory
    {
        return $this->afterCreating(function (Site $site) use ($count) {
            Tribute::factory($count)->create([
                'site_id' => $site->id,
            ]);
        });
    }
}
