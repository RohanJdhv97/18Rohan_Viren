<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);

        $this->call(DiscloserAndSuppotSeeder::class);
        $this->call(EducationSeeder::class);
        $this->call(HealthSeeder::class);
        $this->call(LivelyhoodAndJobSearchSeeder::class);
        $this->call(PerarEducationPersDvpmntSeeder::class);
        $this->call(PersonalInfoSeeder::class);
        $this->call(SocialNetworkSeeder::class);
        $this->call(TuberculosisSeeder::class);
        $this->call(UserSeeder::class);
    }
}
