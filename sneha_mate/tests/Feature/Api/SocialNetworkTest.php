<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\SocialNetwork;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SocialNetworkTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_social_networks_list(): void
    {
        $socialNetworks = SocialNetwork::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.social-networks.index'));

        $response->assertOk()->assertSee($socialNetworks[0]->tb_positive);
    }

    /**
     * @test
     */
    public function it_stores_the_social_network(): void
    {
        $data = SocialNetwork::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.social-networks.store'), $data);

        $this->assertDatabaseHas('social_networks', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_social_network(): void
    {
        $socialNetwork = SocialNetwork::factory()->create();

        $data = [
            'tb_positive' => $this->faker->text(255),
            'hiv_friends' => $this->faker->text(255),
            'friends_same_art' => $this->faker->text(255),
            'where_met_friends' => $this->faker->text(255),
            'attended_camp' => $this->faker->text(255),
            'friends_in_camp' => $this->faker->text(255),
            'topics_of_discussion' => $this->faker->text(255),
            'likes_in_camp' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.social-networks.update', $socialNetwork),
            $data
        );

        $data['id'] = $socialNetwork->id;

        $this->assertDatabaseHas('social_networks', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_social_network(): void
    {
        $socialNetwork = SocialNetwork::factory()->create();

        $response = $this->deleteJson(
            route('api.social-networks.destroy', $socialNetwork)
        );

        $this->assertModelMissing($socialNetwork);

        $response->assertNoContent();
    }
}
