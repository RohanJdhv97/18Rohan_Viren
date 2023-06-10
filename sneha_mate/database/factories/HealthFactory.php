<?php

namespace Database\Factories;

use App\Models\Health;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class HealthFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Health::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'enough_medicines' => $this->faker->text(255),
            'days_meds_missed' => $this->faker->randomNumber(0),
            'cd4_count' => $this->faker->text(255),
            'cd4_count_num' => $this->faker->text(255),
            'viral_load_count' => $this->faker->text(255),
            'viral_count_num' => $this->faker->text(255),
            'fallen_sick' => $this->faker->text(255),
            'share_health' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
