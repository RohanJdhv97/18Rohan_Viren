<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PerarEducationPersDvpmnt;

class PerarEducationPersDvpmntSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PerarEducationPersDvpmnt::factory()
            ->count(5)
            ->create();
    }
}
