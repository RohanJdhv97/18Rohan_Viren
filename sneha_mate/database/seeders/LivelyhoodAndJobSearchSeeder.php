<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LivelyhoodAndJobSearch;

class LivelyhoodAndJobSearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LivelyhoodAndJobSearch::factory()
            ->count(5)
            ->create();
    }
}
