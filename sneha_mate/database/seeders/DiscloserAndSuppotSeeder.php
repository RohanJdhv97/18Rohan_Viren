<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiscloserAndSuppot;

class DiscloserAndSuppotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DiscloserAndSuppot::factory()
            ->count(5)
            ->create();
    }
}
