<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    public function run(): void
    {
        Site::factory()->create([
            'name' => 'Reza Gunawan',
            'died_at' => '2022-09-07',
        ]);
    }
}