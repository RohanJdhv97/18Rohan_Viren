<?php

namespace Database\Seeders;

use App\Models\Tuberculosis;
use Illuminate\Database\Seeder;

class TuberculosisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tuberculosis::factory()
            ->count(5)
            ->create();
    }
}
