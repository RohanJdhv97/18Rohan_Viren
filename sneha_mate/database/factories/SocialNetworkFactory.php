<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\SocialNetwork;
use Illuminate\Database\Eloquent\Factories\Factory;

class SocialNetworkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SocialNetwork::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tb_positive' => $this->faker->text(255),
            'hiv_friends' => $this->faker->text(255),
            'friends_same_art' => $this->faker->text(255),
            'where_met_friends' => $this->faker->text(255),
            'attended_camp' => $this->faker->text(255),
            'friends_in_camp' => $this->faker->text(255),
            'topics_of_discussion' => $this->faker->text(255),
            'likes_in_camp' => $this->faker->text(255),
        ];
    }
}
