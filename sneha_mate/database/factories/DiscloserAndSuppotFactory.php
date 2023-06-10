<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\DiscloserAndSuppot;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscloserAndSuppotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DiscloserAndSuppot::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'share_about_yourself' => $this->faker->text(255),
            'kind_of_support' => $this->faker->text(255),
            'disclosing_sharing_status' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
