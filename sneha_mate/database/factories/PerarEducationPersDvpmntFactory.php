<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\PerarEducationPersDvpmnt;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerarEducationPersDvpmntFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PerarEducationPersDvpmnt::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'understanding_life_choices' => $this->faker->text(255),
            'qualities_for_pe' => $this->faker->text(255),
            'focus_for_independent_And_sustainable_life' => $this->faker->text(
                255
            ),
            'pe_help_future' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
