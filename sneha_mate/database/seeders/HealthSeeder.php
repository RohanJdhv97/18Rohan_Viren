<?php

namespace Database\Seeders;

use App\Models\Health;
use Illuminate\Database\Seeder;

class HealthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Health::factory()
            ->count(5)
            ->create();
    }
}
